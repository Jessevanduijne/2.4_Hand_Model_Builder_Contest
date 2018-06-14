  // Onderstaande methode wordt aangeroepen als er op de login-knop gedrukt wordt.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  // Onderstaande methode wordt aangeroepen met het resultaat van FB.getLoginstatus() uit de SDK.
  function statusChangeCallback(response) {

    var handDetails = document.getElementById("handDetails");
    var nogNietIngelogd = document.getElementById("nogNietIngelogd");

    if (response.status === 'connected') {
      handDetails.style.display = "block";
      nogNietIngelogd.style.display = "none";
    }
    else if (response.status === 'not_authorized') { // Login gefaald..
      handDetails.style.display = "none";
      nogNietIngelogd.style.display = "block";
    }
    else {
      handDetails.style.display = "none";
      nogNietIngelogd.style.display = "block";
    }
  }

function vulNaamIn(){
  var handname = document.getElementById("handName").value;

  if(handname == "") {
    alert("Voer alsjeblieft een handnaam in voordat je deelneemt aan de wedstrijd!");
    return false; // Als er een error in de code zit, wordt het 'default' uitgevoerd.
  }

  //Functie Teije om hand op te slaan
  save();
}

function submitAndShare()
{
  var handname = document.getElementById("handName").value;

  if(handname == "") {
    alert("Voer alsjeblieft een handnaam in voordat je hem gaat delen!");
    return false; // Als er een error in de code zit, wordt het 'default' uitgevoerd.
  }

  else {
    FB.api('/me', function(response) {
      var fbname = response.name;
      var afbeelding = 'https://media.giphy.com/media/l4KhNMgN64czlGhWg/giphy.gif'; // LEt op: image moet minimaal 200x200pix zijn
      var titel = 'Check de hand ' + handname + ' van ' + fbname;
      var beschrijving = 'Deze prothetische hand is ontworpen voor CSVN. Doneer snel en ontwerp ook een hand!';

      overrideMetaData(titel, beschrijving, afbeelding);
    });
  }
}

function overrideMetaData(overrideTitle, overrideDescription, overrideImage)
{
	FB.ui({
		method: 'share_open_graph',
		action_type: 'og.shares',
		action_properties: JSON.stringify({
			object: {
				'og:title': overrideTitle,
				'og:description': overrideDescription,
				'og:image': overrideImage
			}
		})
	});
}
