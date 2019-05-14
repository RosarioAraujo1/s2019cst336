$(document).ready(function() {
    // adding the time slots to the database through ajax 
    $("#addTime").on("click", function() {
        //   alert("test");
        $.ajax({
            type: "GET",
            url: "addSlot.php",
            dataType: "json",
            data: {
                'date': $("[name=date]").val(),
                'start': $("[name=startTime]").val(),
                'end': $("[name=endTime]").val()
            },
            success: function(data) {
                console.log(data);
            }
        });
        $("#myModal").hide();
    });

    // get time from database and show in html page 
    $.ajax({
        type: "POST",
        url: "showTimeSlot.php",
        dataType: "json",
        data: {},
        success: function(data) {
            console.log(data);

            for (var index in data) {
                var row = $("<tr>");
                var col = '';

                col += '<td><div class="date' + index + '"/div>' + data[index].date + '</td>';
                col += '<td><div class="date' + index + '"/div>' + data[index].start + '</td>';
                col += '<td><div class="date' + index + '"/div>' + data[index].end + '</td>';
                col += '<td><div class="date' + index + '"/div>' + data[index].booked + '</td>';

                col += '<td><button type="button" class="btn btn-default" id="' + data[index].id + '" data-toggle="modal" data-target="#myModalDel" data-backdrop="static" data-keyboard="false">Delete </button></td>';

                row.append(col);
                $("table").append(row);

            }

        }
    });

    //delete the time slot 
    // this doesn't work
    // im confused
    
    $("td button").on("click", function(e) {
        var id = e.target.id;
        // alert(id);
        $.ajax({
            type: "GET",
            url: "get.php",
            dataType: "json",
            data: {
                'id': id
            },
            success: function(data) {
                console.log(data);
                $(".modal-body-del").append('<p> Do you want to Delete? </p>');

                $("#del").on("click", function() {
                    $.ajax({
                        type: "GET",
                        url: "delete.php",
                        dataType: "json",
                        data: {
                            'id': id
                        },
                        success: function(data) {
                            console.log(data);

                        }
                    });
                });

            }
        });
    });


});
