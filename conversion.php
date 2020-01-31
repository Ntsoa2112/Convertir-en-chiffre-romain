<?php
function conversion($nbr){
    $romain_un_neuf = array('I','II','III','IV','V','VI','VII','VIII','IX');
    $dizaine = array('X','XX','XXX','XL','L','LX','LXX','LXXX','XC');
    $centaine = array('C','CC','CCC','CD','D','DC','DCC','DCCC','CM','M');
    if($nbr<10){
        $chiffre_romain = $romain_un_neuf[$nbr-1];
    }
    elseif(strlen($nbr)==2){
        $un = substr($nbr, 0,1);
        $deux = substr($nbr, 1,1);
        if($deux == 0){
            $chiffre_romain = $dizaine[$un-1];
        }
        else{
            $chiffre_romain = $dizaine[$un-1].$romain_un_neuf[$deux-1];
        }
    }
    elseif(strlen($nbr)==3){
        $un = substr($nbr, 0,1);
        $deux = substr($nbr,1,1);
        $trois = substr($nbr,2,1);
        if($deux==0 && $trois==0){
            $chiffre_romain = $centaine[$un-1];
        }
        elseif($deux==0 and $trois!=0){
            $chiffre_romain = $centaine[$un-1].$romain_un_neuf[$trois-1];
        }
        elseif($deux!=0 && $trois!=0){
            $chiffre_romain = $centaine[$un-1].$dizaine[$deux-1].$romain_un_neuf[$trois-1];
        }
    }
    
    echo "$nbr = $chiffre_romain";
}

if(isset($_POST["nombre"])){
    $nombre = htmlspecialchars($_POST["nombre"]);
    conversion($nombre);
}
?>