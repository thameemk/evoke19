
  var accessToken = "7f0b2d64683b4a019ed6e481558892fc";
  var baseUrl = "https://api.api.ai/v1/";
  $(document).ready(function() {
    $("#input").keypress(function(event) {
      if (event.which == 13) {
        $('.chatBox').append('<span class="userInput">' + 'me:'+ $('input').val() + '</span><br><br>')
        event.preventDefault();
        let query  = $('input').val()
        $('input').val('')
        send(query);
      }
    });
  });

  function send(query) {
    var text = query;
    $.ajax({
      type: "POST",
      url: baseUrl + "query?v=20180101",
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      headers: {
        "Authorization": "Bearer " + accessToken
      },
      data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
      success: function(data) {
        setResponse(data);
      }
    });
  }
  function setResponse(val) {
    $(".chatBox").append('<span class="responseData">'+ 'bot:' + val.result.fulfillment.speech + '</span><br><br>');
  }
