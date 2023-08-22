<?php
?>
<div class="contact-form-container">
    <p class="contact-top-text">
        Contactez-nous vite afin de prendre rendez-vous pour l’entretien ou la révision de votre véhicule, ou encore
        pour parler de nos véhicules d’occasion !
    </p>
    <label for="message-object" class="form-label">Objet du message</label>
    <form method="POST" action="" id="contact-form">
        <select id="message-object" required>
            <option>Sélectionnez l'objet :</option>
            <option value="rdv">Demande de rendez-vous</option>
        </select>
        <label class="form-label" for="input-name">
            Entrez votre nom :
        </label>
        <input class="form-input" type="text" id="input-name" name="nom" value="" placeholder="Votre nom :" required />

        <label class="form-label" for="input-firstname">Entrez votre prénom :</label>
        <input class="form-input" type="text" id="input-firstname" name="prenom" value="" placeholder="Votre prénom :"
            required />

        <label class="form-label" for="input-email">Entrez votre email :</label>
        <input class="form-input" type="email" id="input-email" name="email" value="" placeholder="Votre email :"
            required />

        <label class="form-label" for="input-phone">Téléphone :</label>
        <input class="form-input" type="tel" id="input-phone" name="telephone" value=""
            placeholder="Numéro de téléphone *" />

        <label class="form-label" for="input-message">Votre message :</label>
        <textarea form="contact-form" class="form-message-area" id="input-message" name="message"
            placeholder="Votre message :" maxlength="500" required></textarea>

        <input type="checkbox" id="contact-cgu">
        <label class="form-label" for="contact-cgu">J'accepte les conditions générales</label>

        <button type="submit" class="submit-btn">Valider</button>




    </form>
</div>