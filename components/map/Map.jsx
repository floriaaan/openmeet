import {
  MapContainer,
  TileLayer,
  Marker,
  useMapEvents,
  Popup,
} from "react-leaflet";

import "leaflet/dist/leaflet.css";

import PropTypes from "prop-types";
import { useTheme } from "next-themes";

/**
 * A wrapper for Leaflet Map to avoid Next.JS Serverside Rendering, that handle map click and markers click events
 *
 * @param {Object} props
 * @returns {JSX.Element}
 */
const LeafletMap = ({
  position,
  zoom,
  markers,
  className,
  mapEventHandler,
  markerEventHandler,
  setMap,
}) => {
  /**
   * Implements events handler in Leaflet map
   *
   * @returns {JSX.Element}
   */
  const MapEventHandler = () => {
    const map = useMapEvents({
      click: (e) => {
        mapEventHandler.click(e);
        // if (previousSelected !== null) {
        //   previousSelected.setIcon(markerIcon);
        //   setPreviousSelected(null);
        // }
      },
    });
    return <></>;
  };

  const { theme } = useTheme();

  // useEffect(() => {
  //   if (selectedOMT != null) {
  //     if (previousSelected) {
  //       previousSelected.setIcon(markerIcon);
  //     }
  //     // e.target.setIcon(activeIcon);
  //     // setPreviousSelected(e.target);
  //   }
  // }, [selectedOMT]);

  return (
    <MapContainer
      className={className}
      center={position}
      zoom={zoom}
      onClick={() => {}}
      minZoom={4}
      whenCreated={(map) => (setMap(map))}
    >
      <TileLayer
        url={
          theme === "light"
            ? "https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png"
            : "https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png"
        }
        attribution="osm"
      />

      {markers && (
        <>
          {markers.map(
            (el, key) =>
              el &&
              el?.lat &&
              el?.lng && (
                <Marker
                  position={[el.lat, el.lng]}
                  key={key}
                  // icon={markerIcon}
                  // eventHandlers={{
                  //   click: (e) => {
                  //     if (previousSelected) {
                  //       previousSelected.setIcon(markerIcon);
                  //     }
                  //     markerEventHandler.click(e);
                  //     e.target.setIcon(activeIcon);
                  //     setPreviousSelected(e.target);
                  //   },
                  //   mouseover: (e) => e.target.openPopup(),
                  // }}
                ></Marker>
              )
          )}
        </>
      )}
      <MapEventHandler></MapEventHandler>
    </MapContainer>
  );
};

LeafletMap.propTypes = {
  position: PropTypes.array,
  zoom: PropTypes.number,
  markers: PropTypes.array,
  mapEventHandler: PropTypes.object,
  markerEventHandler: PropTypes.object,
};

LeafletMap.defaultProps = {
  position: [48.8798704, 0.1712529],
  zoom: 8,
  mapEventHandler: { click: () => console.log("Map clicked") },
  markerEventHandler: { click: () => console.log("Marker clicked") },
};

export default LeafletMap;
