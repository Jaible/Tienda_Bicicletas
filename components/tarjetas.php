<?php

    function tarjetaTabla($titulo, $imagen, $link) {
        $tarjeta = "<div class='col'>
                        <div class='card mb-3' style='max-width: 540px;'>
                            <div class='row g-0'>
                                <div class='col-md-4'>
                                    <img src='../images/$imagen' class='img-fluid rounded-start' alt='$titulo'>
                                </div>
                                <div class='col-md-8'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$titulo</h5>
                                        <p class='card-text'><a href='$link' class='btn btn-primary'>Administrar tabla</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";

        echo $tarjeta;
    }

?>