
//app.use(express.bodyParser());
//app.post('/index.html', function(req, res) {
//  console.log(req.body);
//});


// var builder = require('botbuilder');
// var restify = require('restify');

// var server = restify.createServer();
// server.listen(process.env.port || process.env.PORT || 3978, function () {
//     console.log('%s listening to %s', server.name, server.url);
// });

// // Create chat bot
// var connector = new builder.ChatConnector({
//     appId: process.env.MICROSOFT_APP_ID,
//     appPassword: process.env.MICROSOFT_APP_PASSWORD
// });

// var bot = new builder.UniversalBot(connector);
// server.post('/api/messages', connector.listen());

// // You can provide your own model by specifing the 'LUIS_MODEL_URL' environment variable
// // This Url can be obtained by uploading or creating your model from the LUIS portal: https://www.luis.ai/
// var LuisModelUrl = 'https://api.projectoxford.ai/luis/v1/application?id=7cd88ba2-719b-4cb2-8b8d-9538fcffbe5b&subscription-key=cacac477e8104373a657bf4033b0e212';

// // Main dialog with LUIS
// var recognizer = new builder.LuisRecognizer(LuisModelUrl);
// /*
// var User=require("./User");
// var users=require("./User").users;

// var obj={
// products: [
//     {
// 	name: "classic",
// 	shape: "triangle",
// 	description: "White wheat bread 55%, bacon 17%, salad cream 14%, cheese 11%, sour pickle 11%",
// 	price: 100,
// 	tags: [
// 	    "triangle",
// 	    "classic",
// 	    "White wheat bread",
// 	    "bacon",
// 	    "salad cream",
// 	    "cheese",
// 	    "sour pickle"
// 	]
//     },
//     {
// 	name: "tuna",
// 	shape: "triangle",
// 	description: "White wheat bread with seeds 56%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "ham",
// 	shape: "triangle",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "beacon",
// 	shape: "triangle",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "sausage",
// 	shape: "triangle",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "chicken",
// 	shape: "triangle",
//     description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "winter salami",
// 	shape: "triangle",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "turkey",
// 	shape: "triangle",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "3xcheese",
// 	shape: "triangle",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "classic",
// 	shape: "cube",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "ham",
// 	shape: "cube",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "cheese",
// 	shape: "cube",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "classic",
// 	shape: "elipse",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "fried chicken",
// 	shape: "elipse",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     },
//     {
// 	name: "ham",
// 	shape: "elipse",
// 	description: "White wheat bread with seeds 52%, tuna 18%, salad cream 18%, bulbs 4%, sour pickle 4%"
//     }
//   ]
// };

// var Product=function(){
    
// };

// function setCookie(cname, cvalue, exmins) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exmins*60*1000));
//     var expires = "expires="+d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }

// function getCookie(cname) {
//     var name = cname + "=";
//     var ca = document.cookie.split(';');
//     for(var i = 0; i < ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0) == ' ') {
//             c = c.substring(1);
//         }
//         if (c.indexOf(name) == 0) {
//             return c.substring(name.length, c.length);
//         }
//     }
//     return "";
// }

// function checkCookie() {
//     var user = getCookie("id");
//     return user==="";
// }

// var foodEntity,attributeEntity,numberEntity;

// function test(){
//   	var id;
//         if(checkCookie()){
//         id=Math.floor(Math.random()*100000);
//         while(users[id]){
//             id=Math.floor(Math.random()*100000);
//         }
//         var usr=new User();
//         setCookie("id",id,5);
//         users[id]=usr;
//         }else{
//             id=getCookie("id");
//         }
// }*/

// var intents = new builder.IntentDialog({ recognizers: [recognizer] })
//   .matches('iDontKnow', (session, args) => {
// 	//test();
//       var foodEntity = builder.EntityRecognizer.findEntity(args.entities, 'food');
//       var attributeEntity = builder.EntityRecognizer.findEntity(args.entities, 'attribute');
//       var numberEntity = builder.EntityRecognizer.findEntity(args.entities, 'builtin.number');
//       if(!foodEntity){
//         session.send("sss");   
//       }
//       session.send("aa");
//       //I don't know
//   })

//   .matches('dontWant', (session, args) => {

//       //I don't want
//   })
   
//   .matches('iWant', (session, args) => {
//       //atribut trougao...
//         var foodEntity = builder.EntityRecognizer.findEntity(args.entities, 'food');
//         var attributeEntity = builder.EntityRecognizer.findEntity(args.entities, 'attribute');
//         var numberEntity = builder.EntityRecognizer.findEntity(args.entities, 'builtin.number');
       
//       // session.send('');
        
//         if (foodEntity) {
            
//             if(attributeEntity && numberEntity){
//             session.send('You ordered \%s\ of \%s\ \%s\...Did I get your order correct?',numberEntity.entity, attributeEntity.entity,foodEntity.entity);
//             //session.send('Did I get your order correct?');
            
//             //Yes/No
            
//             }
//             else if(attributeEntity)
//              {
//                   session.send('You ordered one of \%s\ \%s\..Did I get your order correct?',attributeEntity.entity,foodEntity.entity);
//                   //session.send('Did I get your order correct?');   
                  
//                   //Yes/No            
//               }
               
//               else if(numberEntity)
//              {
//                   session.send('I see you want \%s\ of \%s\..Which type of tuna do you want?',numberEntity.entity,foodEntity.entity);
//                   //session.send('Which type of tuna do you want?');   
                  
//                   //Filter -> pick tuna from list            
//               }
//               else
//               {
//                   session.send('I see you want \%s\..Which type of \%s\ do you want?',foodEntity.entity,foodEntity.entity);
//                   //session.send('Which type of \%s\ do you want?',foodEntity.entity);   
                  
//                   //Filter -> pick tuna from list 
                  
//               }
               
            
//         }else{
//             session.send('I can\'t seem to find that, could you please repeat your order for me?');
//         }
// });

// //    .matches('Hello', builder.DialogAction.send('je l\' ga vozis?'))
//     /*.onDefault((session) => {
//         session.send('Could you please repeat your order for me?');
//     });*/

// bot.dialog('/', intents);