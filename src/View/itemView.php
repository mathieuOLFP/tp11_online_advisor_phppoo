<?php $title='Poster un nouveau commentaire' ?>

<?php ob_start(); ?>


<p>Bienvenue sur Online Advisor !</p>
<p><a href="index.php">Retour à la liste des items</a></p>


<div class="news">
    <h3>
        <?php echo htmlspecialchars($getItem['item_name']); ?>
        <?php echo htmlspecialchars($getItem['category']); ?>
        <em>le <?php echo $getItem['date_creation']; ?></em>
        <?php echo htmlspecialchars($getItem['rate']); ?>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($getItem['review']));
    echo nl2br(htmlspecialchars($getItem['user']));
    ?>
    <br />
    
    </p>
</div>

<h2>Commentaires</h2>

<?php
while($affiche_message = $getComments->fetch()){

  ?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($affiche_message['user']); ?>
        <em>le <?php echo $affiche_message['date_comment']; ?></em>
        
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($affiche_message['comment']));
    
    ?>
    <br>
    <em><a href="items/getComments/<?=$affiche_message['id']; ?>">Modifier</a></em>
    </p>
</div>
<?php

  }

 ?>



<p class="news">Nouveau commentaire :</p>

<form method="post" action="items/addComment/<?=$affiche_message['id'] = $getComments->fetch() ?>" class="news">

                <label for="auteur">Auteur : </label>
                <input type="text" name="auteur" id="auteur"  size="50" minlength="2" maxlength="50">
                </br>
                <label for="comment">Commentaire : </label>
                <input type="text" name="comment" id="comment" placeholder="Votre commentaire" size="50" maxlength="255" required >
                </br>

                 <input type="submit" value="Envoyer" />

</form>
<?php

  $getComments->closeCursor();

 ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>