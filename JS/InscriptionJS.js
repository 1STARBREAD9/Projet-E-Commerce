document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("inscriptionForm");
    const nomInput = document.getElementById("Nom");
    const prenomInput = document.getElementById("Prenom");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmpassword");
    const nomError = document.getElementById("nom-error");
    const prenomError = document.getElementById("prenom-error");
    const emailError = document.getElementById("email-error");
    const mdp = document.getElementById("motdepasse-error");
    const passwordError = document.getElementById("password-error");
  
    form.addEventListener("submit", function (event) {
      let isValid = true;
  
      // Validation du champ Nom
      const nomRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ-' ]{3,}$/;
      if (!nomRegex.test(nomInput.value)) {
        isValid = false;
        nomError.textContent = "Le nom n'est pas valide.";
      } else {
        nomError.textContent = ""; // Efface le message d'erreur
      }
  
      // Validation du champ Prénom
      const prenomRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ-' ]{3,}$/;
      if (!prenomRegex.test(prenomInput.value)) {
        isValid = false;
        prenomError.textContent = "Le prénom n'est pas valide.";
      } else {
        prenomError.textContent = ""; // Efface le message d'erreur
      }
  
      // Validation du champ Email
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{3,}$/;
      if (!emailRegex.test(emailInput.value)) {
        isValid = false;
        emailError.textContent = "L'adresse email n'est pas valide.";
      } else {
        emailError.textContent = ""; // Efface le message d'erreur
      }

        // Validation du champ Mot de passe
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}$/;
    if (!passwordRegex.test(passwordInput.value)) {
      isValid = false;
      mdp.textContent = "Le mot de passe doit avoir au moins 12 caractères, inclure au moins une lettre minuscule, une lettre majuscule et un chiffre.";
    } else {
      mdp.textContent = ""; // Efface le message d'erreur
    }
  
      // Validation du champ Confirmation du mot de passe
      if (passwordInput.value !== confirmPasswordInput.value) {
        isValid = false;
        passwordError.textContent = "La confirmation du mot de passe ne correspond pas.";
      } else {
        passwordError.textContent = ""; // Efface le message d'erreur
      }
  
      if (!isValid) {
        event.preventDefault(); // Empêche l'envoi du formulaire
      }
    });
  });
  