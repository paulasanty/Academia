<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../index.php?erro=1");
}
?>
<?php include_once '../includes/header.inc.php'  ?>
    <div class="wrapper">
<?php include_once '../includes/menu_ger.php'  ?>

<div class="row">
            <?php
            $imagens = ['2.jpg', '4.jpg', '7.jpg', '8.jpg'];
            shuffle($imagens);
            foreach ($imagens as $galeria) {
                echo "<div class='col s12 m4 l3' style='padding:0px'>";
                echo "<img src='../_img/$galeria' class='materialboxed responsive-img'>";
                echo "</div>";
            }
            ?>
            </div>
            <div class="row-conteiner">
                <div class="col-12">
                    <p></p>
                    <h5 id="cabecalho"> Academia Maromba</h5><hr>
                    <p style="text-align:justify">
                    "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                    "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."
                    What is Lorem Ipsum?
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make 
                    a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
                    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.
                </p>
                <br>
                </div>
                <div class="row">
            <?php
            $imagens = ['9.jpg', '10.jpg', '14.jpg', '15.jpg'];
            shuffle($imagens);
            foreach ($imagens as $galeria) {
                echo "<div class='col s12 m4 l3' style='padding:0px'>";
                echo "<img src='../_img/$galeria' class='materialboxed responsive-img'>";
                echo "</div>";
            }
            ?>
            </div>

            </div>
        </div>
    </div>
    <?php include_once '../includes/footer.inc.php' ?>