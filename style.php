.picture {
    height:25px;
    width: 16px;
    float:right;
    background-image: url("bilder/papierkorb_geschlossen.png");
    background-repeat:no-repeat;
}

.picture:hover {
    background-image: url("bilder/papierkorb_offen.png");
}

.picture:active {
		header("location:delete.php?page=$page");
}