var express = require('express');
var nodemailer = require("nodemailer");
var smtpTransport = require("nodemailer-smtp-transport")
var app = express();

var smtpTransport = nodemailer.createTransport(smtpTransport({
    host : "YOUR SMTP SERVER ADDRESS",
    secureConnection : false,
    port: 587,
    auth : {
        user : "YourEmail",
        pass : "YourEmailPassword"
    }
}));
app.get('/send',function(req,res){
    var mailOptions={
        from : "rapidavd@vimmey.com",
        to : "raj.chopra10@gmail.com",
        subject : "hello",
        text : "text",
        html : "HTML GENERATED",
    }
    console.log(mailOptions);
    smtpTransport.sendMail(mailOptions, function(error, response){
        if(error){
            console.log(error);
            res.end("error");
        }else{
            console.log(response.response.toString());
            console.log("Message sent: " + response.message);
            res.end("sent");
        }
    });
});

app.listen(3000,function(){
    console.log("Express Started on Port 3000");
});
