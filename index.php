<?php
include_once('includes/cabecalho.php');
include_once('includes/conexao.php');
?>

<div class="ghost-element">
</div>



<div class="welcome-gallery small-12 columns">



    <div class="photo-section small-12 columns">
        <img class="homepage-main-photo" src="img/main-photo.jpg" alt="slider imagem 1">
    </div>

    <div class="main-section-title small-10 columns">
        <div class="table">
            <div class="table-cell">
                <h1>Bem vindo ao Restô Bar</h1>
                <h2>A cozinha tradicional na Brasa</h2>

            </div>
        </div>

    </div>

    <div class="photo-gradient">

    </div>

</div>




<div class="about-us small-11 large-12 columns no-padding small-centered">
    <?php
        $sql = "SELECT * FROM tb_alteracao";

        $result = $conexao->query($sql);
        $row = $result->fetch_assoc();
        ?>


    <div class="global-page-container">
        
        <div id="about-us" class="about-us-title small-12 columns no-padding">
            <h3><?php echo $row['titulo']?></h3>
            <hr>
            </hr>
        </div>

        <img src="img/alteracao/<?php echo $row['imagem'] ?>" alt="">

        <div class="about-us-text">
            <p>
                <?php echo $row['descricao']?>
            </p>

        </div>

    </div>
</div>

        <div class="cardapio small-11 large-12 columns no-padding small-centered">
            <div class="global-page-container">
                <div class="cardapio-title small-12 columns no-padding">
                    <h3>Cardapio</h3>
                    <hr>
                    </hr>
                </div>
            </div>

            <div class="global-page-container">

                <div class="slider-cardapio">
                    <div class="slider-002 small-12 small-centered columns">
                        <?php
                            $sql = "SELECT * FROM tb_pratos WHERE destaque";

                            $result = $conexao->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                        <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns">
                            <div class="cardapio-item">
                                <a href="prato.php?prato=<?php echo $row['codigo']?>">

                                    <div class="cardapio-item-image">
                                        <img src="img/cardapio/<?php echo $row['codigo'] ?>.jpg" alt="<?php echo $row['nome'] ?>" />
                                    </div>

                                    <div class="item-info">


                                        <div class="title"><?php echo $row['nome'] ?></div>
                                    </div>

                                    <div class="gradient-filter">
                                    </div>

                                </a>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            echo 'Não foi';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="contact-us" class="contact-us small-11 large-12 columns no-padding small-centered">

            <div class="global-page-container">
                <div class="contact-us-title small-12 columns no-padding">
                    <h3>Faça a sua reserva</h3>
                    <hr>
                    </hr>
                </div>


                <div class="reservation-form small-12 columns no-padding">

                    <form action="admin/cadastrar_reservas.php" method="post" role="form">

                        <div class="form-part1 small-12 large-8 xlarge-7 columns no-padding">

                            <input type="text" name="nome" id="nome" class="field" placeholder="Nome completo" />

                            <input type="text" name="email" id="email" class="field" placeholder="E-mail" />

                            <textarea type="text" name="mensagem" id="mensagem" class="field" placeholder="Mensagem"></textarea>


                        </div>

                        <div class="form-part2 small-12 large-3 xlarge-3 end columns no-padding">
                            <input type="text" name="telefone" id="telefone" class="field" placeholder="Telefone" />

                            <input type="datetime-local" name="data" id="data" class="field" placeholder="Data e hora" />

                            <input type="text" name="pessoas" id="pessoas" class="field" placeholder="Número de pessoas" />

                            <input type="submit" name="submit" value="Reservar" />

                        </div>


                    </form>
                </div>

            </div>
        </div>
        <?php
        include('includes/rodape.php');
        ?>