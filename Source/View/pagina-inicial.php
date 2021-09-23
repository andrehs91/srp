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
            Estão disponíveis os quantitativos de minutos gastos por tarefa, por projeto e o custo baseado na hora trabalhada, caso seja informado o valor da hora trabalhada.<br>
            Para consultar os relatórios, acesse o menu superior e selecione a opção <a href="/relatorios">Relatórios</a>.
        </li>
        <li>
            <strong>Teste da forma que preferir:</strong><br>
            Para fins de teste do sistema, você pode escolher entre limpar o banco de dados para adicionar teus próprios projetos/tarefas ou utilizar um <i>dataset</i> pré-configurado:<br>
            <a class="btn btn-primary mt-2 me-2" href="/DB?limpar=true" role="button">Limpar Banco de Dados</a>
            <a class="btn btn-primary mt-2" href="/DB?popular=true" role="button">Popular Banco de Dados</a>
        </li>
    </ol>
</section>
<section class="mb-3 alert alert-secondary">
    <h3>Decisões Técnicas</h3>
    <h4>Estrutura e Forma</h4>
    <p>A arquitetura deste sistema é baseada nos padrões <u>MVC</u>, <u>DAO</u> e <u>Front Controller</u>. Tais escolhas foram feitas com o objetivo de criar um nível adequado de separação de responsabilidades, fator que facilita a manutenção da base de códigos e viabiliza a escalabilidade do software.</p>
    <p>Além disso, o sistema foi projetado para trabalhar como uma <u>página web clássica</u>. Isto se deve a uma preferência deste desenvolvedor, que defende que diversas aplicações (sobretudo as empresarias) não devem ser desenvolvidas como SPAs se não forem de fato multiplataforma, visto que tal prática aumenta a complexidade do projeto, altera o controle de fluxo natural dos navegadores (voltar/avançar, abrir em múltiplas abas) e pode causar lentidão nos casos de excesso de requisições assíncronas em redes de baixo desempenho, fatores que impactam negativamente a experiência do usuário.</p>
    <h4>Back-End</h4>
    <p class="mb-0">A linguem escolhida para o desenvolvimento do back-end da aplicação foi o <u>PHP</u> em sua <u>versão 8</u>. Seguem alguns dos motivos que influenciaram esta escolha:</p>
        <ol>
            <li>Trata-se de um sistema web, cenário em que o PHP já provou seu valor;</li>
            <li>Por ser uma linguagem consolidada e com documentação abundante, a busca por ajuda se torna bastante fácil;</li>
            <li>O PHP é uma linguagem que vem apresentando diversas evoluções em funcionalidades, desempenho e relacionadas à escrita/leitura de código (Developer Experience).</li>
        </ol>
    <h4>Banco de Dados</h4>
    <p>Por padrão, esta aplicação utiliza o banco de dados <u>MySQL</u> como solução para persistência de dados. Porém, em ambiente de desenvolvimento, ele também foi testado utilizando a biblioteca <u>SQLite3</u> como alternativa. O banco de dados utilizado pode ser alterado através da substituição de apenas duas linhas de código. Apesar da não ser uma prática comum em ambientes de produção, esta substituição é facilitada pela extensão <u>PDO</u> do PHP, que abstrai e padroniza diversos aspectos da conexão com estas ferramentas.</p>
    <h4>Front-End</h4>
    <p>Para agilizar o processo de criação do front-end foi utilizado o framework <u>Bootstrap</u> em sua <u>versão 5</u>. Os conceitos de UX foram observados de forma a proporcionar uma <u>interface responsiva</u>, simples, limpa e de fácil utilização.</p>
</section>
<section class="mb-3 text-center">
    <hr>
    <small>Desenvolvido por <strong><a href="https://www.andrehenrique.tech">André Henrique</a></strong>.</small>
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