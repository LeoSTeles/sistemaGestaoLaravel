<h1>Teste Index Fornecedor</h1>
    @if (count($fornecedores)<= 0)
        <h3>Ainda não existem fornecedores cadastrados</h3>
    @elseif(count($fornecedores)>= 3 && count($fornecedores)<5)
        <h3>Existem alguns fornecedores cadastrados</h3>
    @elseif(count($fornecedores)>10)
        <h3>Existem vários fornecedores cadastrados</h3>
    @endif
    