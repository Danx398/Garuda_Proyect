<style>
    * {
        margin: 0;
        padding: 0;
    }

    
    .container_carga {
        background-color: rgba(104, 104, 104, 0.2);
        height: 100%;
        width: 100%;
        position: fixed;
        backdrop-filter: blur(7px);
        clip-path: circle(150% at 100% 0);
        transition: clip-path 3s ease-in-out;
    }
    
    .container_carga .fondo{
        background-color: rgba(255, 255, 255, 0.8);
        width: 280px;
        height: 280px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        border-radius: 50%;
    }
    
    .container_carga .fondo .kmy {
        width: 150px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }

    .circulo1 {
        border: 3px solid rgba(0, 0, 0, 0);
        border-top-color: #b5abce;
        /* border-top-style: groove; */
        height: 200px;
        width: 200px;
        border-radius: 100%;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        -webkit-animation: girar 1s linear infinite;
        -o-animation: girar 1s linear infinite;
        animation: girar 1s linear infinite;
    }

    .circulo2 {
        border: 3px solid rgba(255, 255, 255, 0);
        border-top-color: #839bb1;
        /* border-top-style: groove; */
        height: 220px;
        width: 220px;
        border-radius: 100%;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        -webkit-animation: girar2 2s linear infinite;
        -o-animation: girar2 2s linear infinite;
        animation: girar2 2s linear infinite;
    }

    .circulo3 {
        border: 3px solid rgba(255, 255, 255, 0);
        border-top-color: #934c4c;
        /* border-top-style: groove; */
        height: 240px;
        width: 240px;
        border-radius: 100%;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        -webkit-animation: girar 1.5s linear infinite;
        -o-animation: girar 1.5s linear infinite;
        animation: girar 1.5s linear infinite;
    }

    .loader2{
        clip-path: circle(0% at 100% 0);
    }

    @keyframes girar {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes girar2 {
        from {
            transform: rotate(360deg);
        }

        to {
            transform: rotate(0deg);
        }
    }
</style>
<div class="container_carga" id="container_carga">
    <div class="fondo">
        <div class="circulo1" id="carga"></div>
        <div class="circulo2" id="carga"></div>
        <div class="circulo3" id="carga"></div>
        <img src="{{ asset('img/LogoMamalon.webp') }}" alt="kokushibo" class="kmy">
    </div>
</div>
</body>
<script>
    // window.addEventLitener('load', function() {
    //         // var contenedor = document.getElementById('container_carga');
    //         // contenedor.style.visibility = 'hidden';
    //         // contenedor.style.opacity = 0;
    //         // document.getElementById('container_carga').classList.toggle("loader2")
    //         console.log('Entre');
    //     });
    // window.onload = () => {
    //     var carga = document.getElementById("container_carga");
    //     // carga.removeClass('container_carga');
    //     // carga.addClass('loader2');
    //     carga.style.visibility = 'hidden';
    //     carga.style.opacity = "0";
    //     // $('#container_carga').removeClass('container_carga').addClass('loader2');
    // };
    // hay que importar el jquery
    window.addEventListener("load", function() {
        document.getElementById("container_carga").classList.toggle('loader2');
    });
</script>
