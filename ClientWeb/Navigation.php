<?php session_start();

if ($_SESSION["loggedIn"]) {
    $nom = $_SESSION["nom"];
    $prenom = $_SESSION["prenom"];
    $id = $_SESSION["idUser"];
} else {
    header('location:index.php');
}

?>

<div class="headerbar">
    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="home.php" class="logo"><i class="fa fa-fw fa-book"></i> <span>Books Lender</span></a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fa fa-fw fa-question-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5><small>Aide et Soutien</small></h5>
                    </div>

                    <!-- item-->
                    <a target="_blank" href="https://linkedin.com/in/naouals14" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <b>Voulez vous changez quelquechose ?</b>
                            <span>Contactez nous</span>
                        </p>
                    </a>

                    <!-- item-->
                    <a target="_blank" href="https://linkedin.com/in/naouals14" class="dropdown-item notify-item">
                        <p class="notify-details ml-0">
                            <b>quelquechose ne vas pas ?</b>
                            <span>Contactez nous</span>
                        </p>
                    </a>

                    <!-- All-->
                    <a title="Cliquez pour nous visiter " target="_blank" href="https://linkedin.com/in/naouals14" class="dropdown-item notify-item notify-all">
                        <i class="fa fa-link"></i> Visitez l'auteur
                    </a>

                </div>
            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Bienvenue, <?php echo $prenom; ?></small> </h5>
                    </div>

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i> <span>Profil</span>
                    </a>

                    <!-- item-->
                    <a href="api/deconnexion.php" class="dropdown-item notify-item">
                        <i class="fa fa-power-off"></i> <span>Déconnexion</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>