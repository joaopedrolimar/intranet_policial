<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$senha = 'root';
$banco = 'intranet_db';

// Conexão com o banco de dados
$conexao = new mysqli($host, $user, $senha, $banco);

// Verifica se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}
?>

<?php
// Continuação do código anterior...

// Consulta SQL para selecionar os nomes dos policiais
$sql = "SELECT nome FROM policiais";

// Executa a consulta
$resultado = $conexao->query($sql);

// Verifica se há resultados
if ($resultado->num_rows > 0) {
    // Array para armazenar os nomes dos policiais
    $nomes_policiais = array();

    // Loop através dos resultados e armazenamento dos nomes dos policiais no array
    while ($row = $resultado->fetch_assoc()) {
        $nomes_policiais[] = $row['nome'];
    }

    // Retorna os nomes dos policiais em formato JSON
    echo json_encode($nomes_policiais);
} else {
    // Se não houver resultados, retorna uma mensagem indicando que não há policiais cadastrados
    echo json_encode(array('mensagem' => 'Não há policiais cadastrados'));
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

