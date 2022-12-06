<?php
        include 'acesso.php';
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="..\css\nav.css">
        <title>ADMINISTRAÇÃO</title>
    </head>
    <body>
      
        <!--=============== NAV ===============-->
        <div class="nav" id="nav">
            <nav class="nav__content">
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                    <p>X</p>
                </div>
    
                <a href="admin.php" class="nav__logo" id="a">
                    <i class='bx bxs-home' ></i>
                    <span class="nav__logo-name">Home</span>
                </a>
    
                <div class="nav__list">
    
                    <a href="estatisticas.php" class="nav__link" id="a"> 
                        <i class='bx bx-bar-chart-square' ></i>
                        <span class="nav__name">Estatisticas</span>
                    </a>

                    <a href="veiculos.php" class="nav__link" id="a">
                        <i class='bx bxs-car'></i>
                        <span class="nav__name">Veiculos</span>
                    </a>
    
                    <a href="funcionario.php" class="nav__link" id="a">
                        <i class='bx bxs-user-badge'></i>
                        <span class="nav__name">Funcionários</span>
                    </a>

                    <a href="clientes.php" class="nav__link" id="a">
                        <i class='bx bx-user' ></i>
                        <span class="nav__name">Clientes</span>
                    </a>

                    <a href="vendas.php" class="nav__link" id="a">
                        <i class='bx bx-file'></i>
                        <span class="nav__name">Vendas</span>
                    </a>

                    <a href="cadastrocarro.php" class="nav__link" id="a">
                        <i class='bx bxs-car-garage'></i>
                        <span class="nav__name">Cadastrar Veiculos</span>
                    </a>

                    <a href="cadastro.php" class="nav__link" id="a">
                        <i class='bx bx-user-plus' ></i>
                        <span class="nav__name">Cadastrar Clientes</span>
                    </a>

                    <a href="registrarvendas.php" class="nav__link" id="a">
                        <i class='bx bx-money' ></i>
                        <span class="nav__name">Registrar Vendas</span>
                    </a>

                    <a href="sair.php" class="nav__link" id="a">
                        <i class='bx bx-log-out'></i>
                        <span class="nav__name">Sair</span>
                    </a>

                </div>
            </nav>
        </div>
       
        <script>
        const linkColor = document.querySelectorAll('.nav__link')

        function colorLink(){
            linkColor.forEach(l => l.classList.remove('active-link'))
            this.classList.add('active-link')
        }

        linkColor.forEach(l => l.addEventListener('click', colorLink))

        const showMenu = (toggleId, navbarId) =>{
            const toggle = document.getElementById(toggleId),
            navbar = document.getElementById(navbarId)

            if(toggle && navbar){
                toggle.addEventListener('click', ()=>{
                    
                    navbar.classList.toggle('show-menu')
                   
                    toggle.classList.toggle('rotate-icon')
        })
    }
}
showMenu('nav-toggle','nav')
        </script>
    </body>
</html>