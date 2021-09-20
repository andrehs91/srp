<h1 class="text-center mb-3">Sistema para Registro de Produção</h1>
<section class="mb-3">
    <h2>O que é o SRP?</h2>
    <p>O SRP é um sistema criado para o registro do tempo despendido em tarefas vinculadas a projetos previamente cadastrados, possibilitando o controle da produtividade e facilitando a estimativa de tempo necessário para a execução de novos projetos/tarefas similares, bem como no fornecimento de relatórios de cobrança baseado no custo da hora trabalhada.</p>
</section>
<section class="mb-3">
    <h2>Como utilizar o SRP?</h2>
    <ol>
        <li>
            <strong>Crie um projeto:</strong><br>
            Toda tarefa deve ser vinculada a um projeto, então comece criando um.<br>
            Para criar um projeto, acesse o menu superior e selecione a opção <a href="/projetos">Projetos</a>.
        </li>
        <li>
            <strong>Registre suas tarefas:</strong><br>
            Escolha um projeto e informe os dados da tarefa a ser registrada.<br>
            Para registrar uma tarefa, acesse o menu superior e selecione a opção <a href="/tarefas">Tarefas</a>.
        </li>
        <li>
            <strong>Consulte os relatórios:</strong><br>
            Estão disponíveis os quantitativos de minutos gastos por tarefa, por projeto e o custo baseado na hora trabalhada, podendo ser gerado por projeto ou por tarefa.<br>
            Para consultar os relatórios, acesse o menu superior e selecione a opção <a href="/relatorios">Relatórios</a>.
        </li>
    </ol>
</section>
<section class="mb-3 alert alert-secondary">
    <h3>Decisões Técnicas</h3>
    <h4>Estrutura e Forma</h4>
    <p>A arquitetura deste sistema é baseada nos padrões MVC, DAO e Front Controller. Tais escolhas foram feitas com o objetivo de criar um nível adequado de separação de responsabilidades, fator que facilita a manutenção da base de códigos e viabiliza a escalabilidade do software.</p>
    <p>Além disso, o sistema foi projetado para trabalhar como uma página web clássica, utilizando requisições assíncronas apenas onde são necessárias. Isto se deve a uma preferência deste desenvolvedor, que defende que diversas aplicações (sobretudo as empresarias) não devem ser desenvolvidas como SPAs se não forem de fato multiplataforma, visto que tal prática aumenta a complexidade do projeto, altera o controle de fluxo natural dos navegadores (voltar/avançar, abrir em múltiplas abas) e pode causar redução do desempenho nos casos de excesso de requisições assíncronas, fatores que impactam negativamente a experiência do usuário.</p>
    <h4>Back-End</h4>
    <p class="mb-0">A linguem escolhida para o desenvolvimento do back-end da aplicação foi o PHP em sua versão 8. Dois motivos contribuíram para esta escolha:</p>
        <ol>
            <li>Trata-se de um sistema web, cenário em que o PHP já provou seu valor;</li>
            <li>O PHP é uma linguagem que vem apresentando diversas evoluções em funcionalidades, desempenho e relacionadas à escrita/leitura de código (Developer Experience).</li>
        </ol>
    <h4>Banco de Dados</h4>
    <p>Por padrão, a biblioteca SQLite3 é utilizada para fazer a persistência de dados da aplicação. Porém, é possível fazer sua substituição pelos bancos MySQL ou MariaDB através da alteração de apenas uma linha de código.</p>
    <h4>Front-End</h4>
    <p>Para agilizar o processo de criação do front-end foi utilizado o framework Bootstrap em sua versão 5. Os conceitos de UX foram observados de forma a proporcionar uma interface responsiva, simples, limpa e de fácil utilização.</p>
</section>
<section class="mb-3 text-center">
    <hr>
    <small>Desenvolvido por <strong><a href="https://andrehenrique.tech">André Henrique</a></strong>.</small>
    <div>
        <a href="https://github.com/andrehs91" target="_blank" class="text-primary"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-github"></use>
        </svg></a>
        <a href="https://www.linkedin.com/in/andre-henrique-dos-santos/" target="_blank" class="text-primary"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-linkedin"></use>
        </svg></a>
        <a href="mailto:andrehs@outlook.com.br?subject=SRP" class="text-primary"><svg class="icon">
            <use xlink:href="img/icons.svg#icon-email"></use>
        </svg></a>
    </div>
</section>