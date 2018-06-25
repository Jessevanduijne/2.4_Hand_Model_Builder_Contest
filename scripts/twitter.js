function tweetTweet(){
  var handname = document.getElementById("handName").value;
  var url = "https://twitter.com/intent/tweet";
  var text = '@userName heeft de hand ' + handname + ' ontworpen om het goede doel Child Surgery Vietnam onder de aandacht te brengen. Doneer snel en ontwerp ook een hand! Bekijk hem hier http://552779.infhaarlem.nl/handimg/' + ftpimage;
  var hashtags = "csvn, 100handen, childsurgeryvietnam";
  var userName = "userName";
  window.open(url + "?text=" + text + ";hashtags=" + hashtags + ";via=" + userName,"","width=800, height=600")
}
