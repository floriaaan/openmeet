const functions = require("firebase-functions");
const nodemailer = require("nodemailer");

const EMAIL = functions.config().email.email;
const EMAIL_PWD = functions.config().email.password;

let transporter = nodemailer.createTransport({
  service: "gmail",
  auth: {
    user: EMAIL,
    pass: EMAIL_PWD,
  },
});

const sendVerificationEmail = functions
  .region("europe-west1")
  .firestore.document("newsletter_subscriptions/{uid}")
  .onCreate(async (snapshot) => {
    const data = snapshot.data();
    if (data.verified === false) {
      const email = data.email;
      const token = snapshot.id;
      const mailOptions = {
        from: "OpenMeet <no-reply@openmeet.dev>",
        to: email,
        subject: "Verify your email - OpenMeet",
        html: `<p>Hi,</p>
          <p>Please verify your email address by clicking on the link below:</p>
          <p><a href="https://openmeet-252714.web.app/tools/newsletter/verifyEmail?token=${token}">Verify email</a></p>
          <p>If you did not request this, please ignore this email.</p>
          <p>Thanks,</p>
          <p>The OpenMeet Team</p>`,
      };
      transporter.sendMail(mailOptions, function (error, info) {
        if (error) {
          return console.log(error);
        }
        console.log("Message sent: " + info.response);
      });
    }
  });

module.exports = {
  sendVerificationEmail,
};
