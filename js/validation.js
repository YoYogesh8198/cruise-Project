//! validation for not enter number in name field..
$(function () {
  $("#name").keydown(function (e) {
    if (e.ctrlKey || e.altKey) {
      e.preventDefault();
    } else {
      var key = e.keyCode;
      if (
        !(
          key == 8 ||
          key == 9 ||
          key == 32 ||
          key == 46 ||
          (key >= 35 && key <= 40) ||
          (key >= 65 && key <= 90)
        )
      ) {
        e.preventDefault();
      }
    }
  });

  //! validation for not enter alphabets in the number field..
  $("#number").keydown(function (e) {
    if (e.shiftKey || e.ctrlKey || e.altKey) {
      e.preventDefault();
    } else {
      var key = e.keyCode || e.which;
      if (
        !(
          key == 8 ||
          key == 9 ||
          key == 32 ||
          key == 46 ||
          (key >= 35 && key <= 40) ||
          (key >= 48 && key <= 57) ||
          (key >= 96 && key <= 105)
        )
      ) {
        e.preventDefault();
      }
    }
  });
});

const email = document.getElementById("email");
email.addEventListener("input", (event) => {
  if (email.validity.typeMismatch) {
    email.setCustomValidity("I am expecting an email address!");
  } else {
    email.setCustomValidity("");
  }
});

//! function for check name value..
function show_name(value) {
  //   console.log(value);
  var nameRegex =
    /^([a-zA-Z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff][a-zA-Z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff ',.-]*)+$/;
  if (!nameRegex.test(value)) {
    $("#name").css("border", "1px solid red");
  } else {
    $("#name").css("border", "1px solid #ced4da");
  }
}

//! function for check email value..
function checkEmail(value) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(value)) {
    $("#email").css("border", "1px solid red");
  } else if (value.length == null || value.length == "") {
    $("#email").css("border", "1px solid #ced4da");
    $("#email").focus();
  } else {
    $("#email").css("border", "1px solid #ced4da");
  }
}

//! function for check mobile value..
function checkValidateMobile(input) {
  // console.log(input);
  // var regex = /^[0-9]*$/;
  var regex = /^[0-9]{10}$/;
  if (!regex.test(input) || input.length != 10) {
    $("#number").css("border", "1px solid red");
    return false;
  } else if (input.length == null || input.length == "") {
    $("#number").css("border", "1px solid #ced4da");
    return false;
  } else {
    $("#number").css("border", "1px solid #ced4da");
  }
}

//! submit button click validation..
// $(document).ready(function () {
//   $("#submit1").click(function () {
//     var name = $("#name").val();
//     var phone_number = $("#number").val();
//     var phone_length = $("#number").val().length;
//     var total_passenger = $("#travelers").val();
//     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     var email = $("#email").val();
//     var destination = $("#destination").val();
//     var cruise_length = $("#cruise-length").val();
//     var depart_date = $("#depart_date").val();
//     var cruise_line = $("#cruise-line").val();
//     var cruise_ship = $("#cruise-ship").val();
//     var departure_port = $("#departure-port").val();

//     var ErrorMsg = false;

//     // Validation for each input field
//     if (name == "" || name == null || name == undefined) {
//       $("#name").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#name").css("border", "1px solid #ced4da");
//     }

//     if (email == "" || email == null || email == undefined) {
//       $("#email").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else if (emailRegex.test(email) === false) {
//       $("#email").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#email").css("border", "1px solid #ced4da");
//     }

//     if (
//       phone_number == "" ||
//       phone_number == undefined ||
//       phone_number == null
//     ) {
//       $("#number").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else if (phone_length != 10) {
//       $("#number").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#number").css("border", "1px solid #ced4da");
//     }

//     if (
//       total_passenger == "" ||
//       total_passenger == null ||
//       total_passenger == undefined
//     ) {
//       $("#travelers").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#travelers").css("border", "1px solid #ced4da");
//     }

//     if (destination == "" || destination == null || destination == undefined) {
//       $("#destination").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#destination").css("border", "1px solid #ced4da");
//     }

//     if (
//       cruise_length == "" ||
//       cruise_length == null ||
//       cruise_length == undefined
//     ) {
//       $("#cruise-length").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#cruise-length").css("border", "1px solid #ced4da");
//     }

//     if (depart_date == "") {
//       $("#depart_date").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else if (depart_date) {
//       $("#depart").val(depart_date.slice(0, 10));
//       $("#return").val(depart_date.slice(13));
//       $("#depart_date").css("border", "1px solid #ced4da");
//     }

//     if (cruise_line == "" || cruise_line == null || cruise_line == undefined) {
//       $("#cruise-line").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#cruise-line").css("border", "1px solid #ced4da");
//     }

//     if (cruise_ship == "" || cruise_ship == null || cruise_ship == undefined) {
//       $("#cruise-ship").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#cruise-ship").css("border", "1px solid #ced4da");
//     }

//     if (
//       departure_port == "" ||
//       departure_port == null ||
//       departure_port == undefined
//     ) {
//       $("#departure-port").css("border", "1px solid red");
//       ErrorMsg = true;
//       return;
//     } else {
//       $("#departure-port").css("border", "1px solid #ced4da");
//     }

//     if (ErrorMsg) {
//       // If there are errors, return false to prevent form submission
//       return false;
//     }

//     // If no errors, proceed with form submission via AJAX
//     $("#submit1").hide();
//     $("#loading").show();

//     // AJAX FOR FORM SUBMIT
//     $.ajax({
//       type: "post",
//       url: "api.php",
//       data: $("#cruiseForm").serialize(),
//       success: function (response) {
//         console.log(response);
//         if (response["success"]) {
//           $("#loading").hide();
//           $("#formSubmitted").show();
//         } else {
//           $("#loading").hide();
//           $("#formSubmitted").text(response.message);
//           $("#formSubmitted").show();
//         }
//       },
//     });

//     // Prevent default form submission behavior
//     // return false;
//   });
// });

$(document).ready(function () {
  $("#submit1").click(function (e) {
    var name = $("#name").val();
    var phone_number = $("#number").val();
    var phone_length = $("#number").val().length;
    var total_passenger = $("#travelers").val();
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var email = $("#email").val();
    var destination = $("#destination").val();
    var cruise_length = $("#cruise-length").val();
    var depart_date = $("#depart_date").val();
    var cruise_line = $("#cruise-line").val();
    var cruise_ship = $("#cruise-ship").val();
    var departure_port = $("#departure-port").val();

    var ErrorMsg = false;

    // Validation for each input field
    if (name == "" || name == null || name == undefined) {
      $("#name").css("border", "1px solid red");
      // $(".error_1").show();
      ErrorMsg = true;
      return;
    } else {
      $("#name").css("border", "1px solid #ced4da");
    }

    if (email == "" || email == null || email == undefined) {
      $("#email").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else if (emailRegex.test(email) === false) {
      $("#email").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#email").css("border", "1px solid #ced4da");
    }

    if (
      phone_number == "" ||
      phone_number == undefined ||
      phone_number == null
    ) {
      $("#number").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else if (phone_length != 10) {
      $("#number").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#number").css("border", "1px solid #ced4da");
    }

    if (
      total_passenger == "" ||
      total_passenger == null ||
      total_passenger == undefined
    ) {
      $("#travelers").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#travelers").css("border", "1px solid #ced4da");
    }

    if (destination == "" || destination == null || destination == undefined) {
      $("#destination").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#destination").css("border", "1px solid #ced4da");
    }

    if (
      cruise_length == "" ||
      cruise_length == null ||
      cruise_length == undefined
    ) {
      $("#cruise-length").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#cruise-length").css("border", "1px solid #ced4da");
    }

    // if (depart_date) {
    //   $("#depart").val(depart_date.slice(0, 10));
    //   $("#return").val(depart_date.slice(13));
    // }
    if (depart_date == "") {
      $("#depart_date").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#depart").val(depart_date.slice(0, 10));
      $("#return").val(depart_date.slice(13));
      $("#depart_date").css("border", "1px solid #ced4da");
    }

    if (cruise_line == "" || cruise_line == null || cruise_line == undefined) {
      $("#cruise-line").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#cruise-line").css("border", "1px solid #ced4da");
    }

    if (cruise_ship == "" || cruise_ship == null || cruise_ship == undefined) {
      $("#cruise-ship").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#cruise-ship").css("border", "1px solid #ced4da");
    }

    if (
      departure_port == "" ||
      departure_port == null ||
      departure_port == undefined
    ) {
      $("#departure-port").css("border", "1px solid red");
      ErrorMsg = true;
      return;
    } else {
      $("#departure-port").css("border", "1px solid #ced4da");
    }
    e.preventDefault();
    e.stopPropagation();
    if (!ErrorMsg) {
      $("#submit1").hide();
      $("#loading").show();

      //* AJAX FOR FOR SUBMIT
      $.ajax({
        type: "post",
        url: "api.php",
        data: $("#cruiseForm").serialize(),
        success: function (response) {
          console.log(response);
          // response = JSON.parse(response);
          if (response["success"]) {
            $("#loading").hide();
            $("#formSubmitted").show();
          } else {
            $("#loading").hide();
            $("#formSubmitted").text(response["message"]);
            $("#formSubmitted").show();
          }
        },
      });
    }
  });
});

// $(document).ready(function () {
//   //test for getting url value from attr
// // var img1 = $('.test').attr("data-thumbnail");
// // console.log(img1);

// //test for iterating over child elements
// var langArray = [];
// $('.vodiapicker option').each(function(){
//   var img = $(this).attr("data-thumbnail");
//   var text = this.innerText;
//   var value = $(this).val();
//   var item = '<li><img src="'+ img +'" alt="" value="'+value+'"/><span>'+ text +'</span></li>';
//   langArray.push(item);
// })

// $('#a').html(langArray);

// //Set the button value to the first el of the array
// // $('.btn-select').html(langArray[0]);
// // $('.btn-select').attr('value');

// //change button stuff on click
// $('#a li').click(function(){
//    var img = $(this).find('img').attr("src");
//    var value = $(this).find('img').attr('value');
//    var text = this.innerText;
//    var item = '<li><img src="'+ img +'" alt="" /><span>'+ text +'</span></li>';
//   $('#cruise-line').html(item);
//   $('#cruise-line').attr('value', value);
//   $(".b").toggle();
//   // console.log(value);
// });

// $(".btn-select").click(function(){
//         $(".b").toggle();
//     });
// });
// $('#a').on('click', 'li', function(e) {
//   // 'this' refers to the clicked <li> element
//   var clickedItem = $(this).text();
//   console.log('List item clicked:', clickedItem);
// });

$(document).ready(function () {
  var langArray = [];
  $(".vodiapicker option").each(function () {
    var img = $(this).attr("data-thumbnail");
    var text = this.innerText;
    var value = $(this).val();
    var item =
      '<li><img src="' +
      img +
      '" alt="" value="' +
      value +
      '"/><span>' +
      text +
      "</span></li>";
    langArray.push(item);
  });

  $("#a").html(langArray);

  $("#a li").click(function () {
    var img = $(this).find("img").attr("src");
    var value = $(this).find("img").attr("value");
    var text = this.innerText;
    var item =
      '<li><img src="' + img + '" alt="" /><span>' + text + "</span></li>";
    $("#cruise-line").html(item);
    $("#cruise-line").attr("value", value);
    $(".b").hide();
  });

  $(".btn-select").click(function () {
    $(".b").toggle();
  });

  // Add this code to close the dropdown when clicking outside
  $(document).click(function (event) {
    if (!$(event.target).closest(".btn-select").length) {
      $(".b").hide();
    }
  });
});
