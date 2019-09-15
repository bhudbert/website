var i=0;

function changeColor()
{
    var tableauCouleur=
        [
            '#ffffff','#2a2a2a',
            '#133055','#05051d'
        ]
    var nbBoucle = tableauCouleur.length/2;


        var myHeader = document.getElementById('entete');
        myHeader.style.backgroundColor =tableauCouleur[i];
        var myFooter = document.getElementsByTagName('footer');
        myFooter[0].style.backgroundColor =tableauCouleur[i+1];

    if(i<(tableauCouleur.length/2-1)){
        i=i+2;
    }
    else{
        i=0;
    }

}
