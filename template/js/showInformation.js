$(document).ready(function() {
    var numberofButtonClicks = 0;
    var closeAllQuestions = false;

    $("#changeQuestion").click(function showOrHide() {
        if (closeAllQuestions == true) {
            $("#BMIQuestions").slideUp();
            $("#exercisePreferenceQuestions").slideUp();
            $("#weeklyWorkoutQuestions").slideUp();
            closeAllQuestions = false;
            // https://www.w3schools.com/jquery/html_remove.asp
            // https://api.jquery.com/append/
            $("#changeQuestion").empty("Start Here");
            $("#changeQuestion").append("<h2>Start Here</h2>");
        } else {
            if (numberofButtonClicks == 0) {
                $("#BMIQuestions").slideToggle();
                $("#changeQuestion").empty("Next");
                $("#changeQuestion").append("<h2>Next</h2>");
                numberofButtonClicks = 1;
            } else if (numberofButtonClicks == 1) {
                $("#BMIQuestions").slideToggle();
                $("#exercisePreferenceQuestions").slideToggle();
                numberofButtonClicks = 2;
            } else if (numberofButtonClicks == 2) {
                $("#exercisePreferenceQuestions").slideToggle();
                $("#weeklyWorkoutQuestions").slideToggle();
                numberofButtonClicks = 3;
            } else if (numberofButtonClicks == 3) {
                $("#weeklyWorkoutQuestions").slideToggle();
                $("#changeQuestion").empty("Start Here");
                $("#changeQuestion").append("<h2>Start Here</h2>");
                numberofButtonClicks = 0;
            }
        }
    });

    $("#showAllQuestons").click(function showAll() {
        $("#BMIQuestions").slideDown();
        $("#exercisePreferenceQuestions").slideDown();
        $("#weeklyWorkoutQuestions").slideDown();
        $("#changeQuestion").empty("Close");
        $("#changeQuestion").append("<h2>Close</h2>");

        closeAllQuestions = true;
        numberofButtonClicks = 0;
    });

    // Fisher–Yates shuffles
    function shuffle(array) {
        var arraylength = array.length,
            holdValue,
            randomInteger;

        // While there remain elements to shuffle…
        while (arraylength) {
            // Pick a remaining element…
            randomInteger = Math.floor(Math.random() * arraylength--);
            // And swap it with the current element.
            holdValue = array[arraylength];
            array[arraylength] = array[randomInteger];
            array[randomInteger] = holdValue;
        }

        return array;
    }

    $(function() {
        var falseinput = 0;

        $("#ShowFoodTable").click(function() {
            var foodAndNutritionArray = $(".foodlist").removeClass("selected");
            // validate input
            if (
                1 <= $("#getChosenValuebyUser").val() &&
                $("#getChosenValuebyUser").val() <= 7
            ) {
                $("#ShowFoodTable").text("Food Recommendations");

                $(
                    shuffle(foodAndNutritionArray).slice(
                        0,
                        $("#getChosenValuebyUser").val()
                    )
                ).addClass("selected");
            } else {
                falseinput = 1;
                console.log(falseinput);
            }

            if (falseinput == 1) {
                console.log(falseinput);
                $("#getChosenValuebyUser").addClass("falseinput");
                $("#getChosenValuebyUser").focus();
                $("#ShowFoodTable").text("No more than 7 recommendations");
                falseinput = 0;
            }
        });
    });

    $("main").each(function showMuscleGroupGuide(workoutIndex) {
        $("#" + workoutIndex + "more_info").click(function() {
            console.log(workoutIndex);
            $("#" + workoutIndex + "ShowMuscleUsed").fadeToggle(500);
        });
    });

    // https://codepen.io/jvondoom/pen/VvbrdY
    // show and hide tabes of exercises
    $("#showCardio").click(function() {
        $("#tableforCardioWorkouts").fadeToggle(500);
    });
    $("#showWeights").click(function() {
        $("#tableforWeightsWorkouts").fadeToggle(500);
    });
    $("#showResistanceband").click(function() {
        $("#tableforResistancedandWorkouts").fadeToggle(500);
    });
    $("#showBodyweights").click(function() {
        $("#tableforBodyWeightsWorkouts").fadeToggle(500);
    });

    $("#Tutorial").click(function() {
        $(".container_tutorial").fadeToggle(500);
    });

    //check and uncheck for muscle group guide
    $("#absguide").prop("checked", true);
    $("#absguide").prop("checked", false);

    $("#bicepguide").prop("checked", true);
    $("#bicepguide").prop("checked", false);

    $("#shouldersguide").prop("checked", true);
    $("#shouldersguide").prop("checked", false);

    $("#forarmsguide").prop("checked", true);
    $("#forearmsguide").prop("checked", false);

    $("#tricepguide").prop("checked", true);
    $("#tricepguide").prop("checked", false);

    $("#trapeziusguide").prop("checked", true);
    $("#trapeziusguide").prop("checked", false);

    $("#obliqueguide").prop("checked", true);
    $("#obliqueguide").prop("checked", false);

    $("#pectoralguide").prop("checked", true);
    $("#pectoralguide").prop("checked", false);

    $("#adductorguide").prop("checked", true);
    $("#adductorguide").prop("checked", false);

    $("#hamstringsguide").prop("checked", true);
    $("#hamstringsguide").prop("checked", false);

    $("#glutesguide").prop("checked", true);
    $("#glutesguide").prop("checked", false);

    $("#quadsguide").prop("checked", true);
    $("#quadsguide").prop("checked", false);

    // collapse the navbar when clicked outside
    $(document).click(function collapseNavbar(event) {
        var clickover = $(event.target);
        console.log(clickover);
        var opened = $(".navbar-collapse").hasClass("navbar-collapse collapse in");
        if (opened === true && !clickover.hasClass("navbar-toggle")) {
            $("button.navbar-toggle").click();
        }
    });

    // show or hide workout videos
    $("h2.hideAndShow_ResistancebandVideo").click(function() {
        $("#showResistancebandVideo").fadeToggle(500);
    });
    $("h2.hideAndShow_BodyWeightVideo").click(function() {
        $("#showBodyWeightVideo").fadeToggle(500);
    });
    $("h2.hideAndShow_CardioVideo").click(function() {
        $("#showCardioVideo").fadeToggle(500);
    });
    $("h2.hideAndShow_WeightsVideo").click(function() {
        $("#showWeightsVideo").fadeToggle(500);
    });

    $("h2.Facts_for_nf").click(function() {
        $("#Facts").fadeToggle(500);
    });

    jQuery.noConflict();

    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
});
