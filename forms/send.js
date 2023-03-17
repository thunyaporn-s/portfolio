const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');

const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.post('forms/send', (req, res) => {
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'thunyah.service@gmail.com',
      pass: 'service1234!!'
    }
  });

  const mailOptions = {
    from: req.body.email,
    to: 'thunyaporng@gmail.com',
    subject: 'New message from contact form',
    text: `Name: ${req.body.name}\nEmail: ${req.body.email}\nMessage: ${req.body.message}`
  };

  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.log(error);
      res.send('Error sending message.');
    } else {
      console.log('Email sent: ' + info.response);
      res.send('Message sent successfully.');
    }
  });
});

app.listen(3000, () => {
  console.log('Server started on port 3000');
});
