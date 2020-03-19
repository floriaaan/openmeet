<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\ScrapingChooseRequest;
use App\Message;
use App\Subscription;
use App\User;
use App\Participation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Date;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;


class ScrapingController extends Controller
{
    public function ChooseGroup(){
         return view('scraping.choosegroup');
    }

    public function ChooseGroupConfirmation(ScrapingChooseRequest $request){
        $post = $request->input();
        $url = $post['url'];

        //Récupération du contenu de la page
        $pageContent = file_get_contents($url);

        //====================Nom du groupe=================================//
        $regexGroupName ='#<a class="groupHomeHeader-groupNameLink" (.*)<\/a>#Ui';
        preg_match($regexGroupName,$pageContent,$scrapGroupName);
        $groupName = strip_tags($scrapGroupName[0]);
        //dump($groupName);
        //==================================================================//
        //====================Description du groupe=================================//
        $regexGroupDesc = '#<\/p><p class="group-description margin--bottom" (.*?)>(.*?)<\/p><\/div>#';
        preg_match($regexGroupDesc,$pageContent,$scrapGroupDesc);
        $groupDesc = $scrapGroupDesc[2];
        $groupDesc = str_replace('<br />','\n',$groupDesc);
        //dump($groupDesc);
        //===========================================================================//D

        return view('scraping.choosegroupconfirmation',[
            'url'=>$url,
            'groupName'=>$groupName,
            'groupDesc'=>$groupDesc
        ]);
    }

    public function ChooseEvent(){
        return view('scraping.chooseevent');
    }

    public function ChooseEventConfirmation(ScrapingChooseRequest $request){
        $post = $request->input();
        $url = $post['url'];

        //Récupération du contenu de la page
        $pageContent = file_get_contents($url);

        //====================Nom de l'évènement=================================//
        $regexEventName ='#</time></p><h1 class="pageHead-headline text--pageTitle">(.*)<\/h1>#u';
        preg_match($regexEventName,$pageContent,$scrapEventName);
        $eventName = $scrapEventName[1];
        //dump($eventName);
        //==================================================================//
        //====================Description de l'évènement=================================//
        $regexEventDesc = '#<div class="event-description runningText"><p>(.*)<\/p><\/div>#Ui';
        preg_match($regexEventDesc,$pageContent,$scrapEventDesc);
        $eventDesc = $scrapEventDesc[1];
        $eventDesc = str_replace('<br/>','\n',$eventDesc);
        //dump($eventDesc);
        //===========================================================================//
        //====================Heure de début de l'évènement=================================//
        $regexEventHourFrom = '#<span class="eventTimeDisplay-startDate-time"><span>(.*?)<\/span><\/span>#';
        preg_match($regexEventHourFrom,$pageContent,$scrapEventHourFrom);
        $eventHourFrom =$scrapEventHourFrom[1];
        //dump($eventHourFrom);
        //===========================================================================//
        //====================Heure de fin de l'évènement=================================//
        $regexEventHourTo = '#<span class="eventTimeDisplay-endDate-partialTime"><span>(.*?)<\/span><\/span>#';
        preg_match($regexEventHourTo,$pageContent,$scrapEventHourTo);
        $eventHourTo =strip_tags($scrapEventHourTo[1]);
        //dump($eventHourTo);
        //===========================================================================//
        //====================Heure de fin de l'évènement=================================//
        $regexEventDate = '#<time class="eventStatusLabel" (.*?)><span>(.*?)<\/span><\/time>#';
        preg_match($regexEventDate,$pageContent,$scrapEventDate);
        $eventDateStr = $scrapEventDate[2];
        $eventDateStrExp = explode(' ',$eventDateStr);
        $eventDay = $eventDateStrExp[1];
        $eventMonth=null;
        $eventYear = $eventDateStrExp[3];
        $mois=["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
        $i = 0;
        while($eventMonth == null || $eventMonth=="")
        {
            if ($eventDateStrExp[2] == $mois[$i])
            {
                if($i+1 >=10){

                    $eventMonth=$i+1;
                }
                else{
                    $eventMonth="0".($i+1);
                }
            }
            $i++;
        }
        $eventDateFrom = $eventYear."-".$eventMonth."-".$eventDay."T".$eventHourFrom;
        $eventDateTo = $eventYear."-".$eventMonth."-".$eventDay."T".$eventHourTo;
        //dump($eventDateFrom);
        //dump($eventDateTo);

        //===========================================================================//
        //====================Ville de l'évènement=================================//
        $regexEventVille = "#<span> · <!-- -->(.*?)<\/span>#";
        preg_match($regexEventVille,$pageContent,$scrapEventVille);
        $eventVille =$scrapEventVille[1];
        //dump($eventVille);
        //===========================================================================/
        $regexEventRue = '#<p class="venueDisplay-venue-address text--secondary text--small">(.*?)<span>#';
        preg_match($regexEventRue,$pageContent,$scrapEventRue);
        $eventRueStr = $scrapEventRue[1];
        $eventRueStrExp = explode(' ',$eventRueStr);
        $eventRue="";
        if(is_numeric($eventRueStrExp[0])){
            $eventNumRue=$eventRueStrExp[0];
            for($i=0;$i<count($eventRueStrExp);$i++){
                if($i>0){
                    $eventRue=$eventRue.$eventRueStrExp[$i]." ";
                }
            }
            $eventRue=trim($eventRue);
        }
        else{
            $eventNumRue ="";
            $eventRue=$eventRueStr;
        }
        //dump($eventNumRue);
        //dump($eventRue);

        //echo ($pageContent);
        $listGroup = (new Group)->getByAdmin(auth()->user()->id);



        return view('scraping.chooseeventconfirmation',[
            'eventName'=>$eventName,
            'eventDesc'=>$eventDesc,
            'eventDateFrom'=>$eventDateFrom,
            'eventDateTo'=>$eventDateTo,
            'eventNumRue'=>$eventNumRue,
            'eventRue'=>$eventRue,
            'eventVille'=>$eventVille,
            'listGroup'=>$listGroup
        ]);
    }

}
