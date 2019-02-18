/* global $ */

var sum = 0;
var total = 0;

$(".button").on("click", function(e) {

    let imageArray = ["cherry", "grapes", "seven"];
    let randomIndex = Math.floor(Math.random() * 3);
    let randomImage = imageArray[randomIndex];
    var filePath = randomImage.valueOf();

    $("#image1").html("<img src='img/" + randomImage + ".png' />");

    let imageArray1 = ["cherry", "grapes", "seven"];
    let randomIndex1 = Math.floor(Math.random() * 3);
    let randomImage1 = imageArray1[randomIndex1];
    var filePath1 = randomImage1.valueOf();

    $("#image2").html("<img src='img/" + randomImage1 + ".png' />");

    let imageArray2 = ["cherry", "grapes", "seven"];
    let randomIndex2 = Math.floor(Math.random() * 3);
    let randomImage2 = imageArray2[randomIndex2];
    var filePath2 = randomImage2.valueOf();

    $("#image3").html("<img src='img/" + randomImage2 + ".png' />");

    // console.log(filePath, filePath1, filePath2);

    if ((filePath === filePath1) && (filePath === filePath2) && (filePath1 === filePath2) && (filePath1 === filePath2)) { // the same 
        // $('.win').html("JACKPOT");
        if (filePath === 'cherry') {
            sum = 100;
            $('.prize').html("You Won $" + sum);
        }
        else if (filePath === 'grapes') {
            sum = 300;
            $('.prize').html("You Won $" + sum);
        }
        else if (filePath === 'seven') {
            sum = 500;
            $('.prize').html("You Won $" + sum);
             $('.win').html("JACKPOT");
        }
        
        total += sum;
    }
    else { 
        $('.win').html("");
        // $('.fail').html("Try Again!");
    }


    $('.Total').html("Total Winning: $" + total);


});
