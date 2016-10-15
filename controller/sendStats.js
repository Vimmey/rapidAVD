var mailer = require("nodemailer");

// Use Smtp Protocol to send Email
var smtpTransport = mailer.createTransport("SMTP",{
    service: "Gmail",
    auth: {
        user: "",
        pass: ""
    }
});

var mail = {
    from: "Vimmey <rapidavd@vimmey.com>",
    to: "vmy.chopra@gmail.com",
    subject: "Hourly RapidAvd Stats",
    text: "N.A;",
    html: "<b>Some HTML/b>"
}

smtpTransport.sendMail(mail, function(error, response){
    if(error){
        console.log(error);
    }else{
        console.log("Message sent: " + response.message);
    }
    
    smtpTransport.close();
});
