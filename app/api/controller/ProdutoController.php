<?php


class ProdutoController
{
    public function get($args = [])
    {   
        if (
            !isset($args['produto_nome'])
        ) {
            header('HTTP/1.1 404 NOT FOUND');
            die();
        }       

        $nome = $args['produto_nome'];
        $produto = new ProdutoModel();
        
        header('Content-Type: application/json');
        echo json_encode($produto->get($nome));        
    }

    public function post($args = []){        
        print_r($args);
        die();
    }
    /*   

    public function post($args = [])
    {
        if (empty($args)) {
            $this->add();
        } else {
            //$this->edit($args);
        }
    }

    public function addget()
    {
        $queryLocatarios = "SELECT l.locatario_id, l.locatario_nome FROM Locatario l";
        $locatarios = $this->getFromDB($queryLocatarios);

        $queryImoveis = "SELECT i.imovel_id, i.imovel_endereco, i.imovel_proprietario FROM Imovel i";
        $imoveis = $this->getFromDB($queryImoveis);

        $form = '';
        $form .= "<label for='imovel_id'>Imóvel</label>";
        $form .= "<select required class='form-control' name='imovel_id'>";
        foreach ($imoveis as $imovel) {
            $form .= "<option value='" . $imovel['imovel_id'] . "'>" . $imovel['imovel_endereco'] . "</option>";
        }
        $form .= "</select><br>";

        $form .= "<label for='locatario_id'>Locatário</label>";
        $form .= "<select required class='form-control' name='locatario_id'>";
        foreach ($locatarios as $locatario) {
            $form .= "<option value='" . $locatario['locatario_id'] . "'>" . $locatario['locatario_nome'] . "</option>";
        }
        $form .= "</select><br>";

        $form .= "<label for='contrato_data_inicio'>Data Início</label>";
        $form .= "<input required type='text' class='form-control' name='contrato_data_inicio'></input><br>";

        $form .= "<label for='contrato_taxa_admin'>Taxa Admin %</label>";
        $form .= "<input required type='text' class='form-control' name='contrato_taxa_admin'></input><br>";

        $form .= "<label for='contrato_aluguel'>Aluguel</label>";
        $form .= "<input required type='text' class='form-control' name='contrato_aluguel'></input><br>";

        $form .= "<label for='contrato_iptu'>IPTU</label>";
        $form .= "<input required type='text' class='form-control' name='contrato_iptu'></input><br>";

        $form .= "<label for='contrato_condominio'>Condomínio</label>";
        $form .= "<input type='text' class='form-control' name='contrato_condominio'></input><br>";

        $view = new ContratoView();
        $view->formAdd(['add' => $form]);
    }

    protected function add()
    {
        if (
            !isset($_POST['imovel_id'])
            || !isset($_POST['locatario_id'])
            || !isset($_POST['contrato_data_inicio'])
            || !isset($_POST['contrato_taxa_admin'])
            || !isset($_POST['contrato_aluguel'])
            || !isset($_POST['contrato_iptu'])
            || ($_POST['imovel_id']) == ''
            || ($_POST['locatario_id']) == ''
            || ($_POST['contrato_data_inicio']) == ''
            || ($_POST['contrato_taxa_admin']) == ''
            || ($_POST['contrato_aluguel']) == ''
            || ($_POST['contrato_iptu']) == ''
        ) {
            header('HTTP/1.1 500 FAIL');
            header('Location: /home');
            die();
        }

        $imovelId = $_POST['imovel_id'];
        $locatarioId = $_POST['locatario_id'];
        $contratoDataInicio = $_POST['contrato_data_inicio'];
        $contratoTaxaAdmin = $_POST['contrato_taxa_admin'];
        $contratoAluguel = $_POST['contrato_aluguel'];
        $contratoIptu = $_POST['contrato_iptu'];
        $contratoCondominio = $_POST['contrato_condominio'] != '' ? $_POST['contrato_condominio'] : null;

        $queryLocador = "SELECT i.imovel_id, i.imovel_proprietario FROM Imovel i WHERE i.imovel_id = {$imovelId}";
        $locador = $this->getFromDB($queryLocador);

        $query = "INSERT INTO Contrato (imovel_id, proprietario_id, locatario_id, contrato_data_inicio, contrato_taxa_admin, contrato_aluguel, contrato_iptu "
            . ($contratoCondominio != null ? ', contrato_condominio' : '') . ")
        values ('{$imovelId}'," . $locador[0]['imovel_proprietario'] . ",'{$locatarioId}','{$contratoDataInicio}','{$contratoTaxaAdmin}','{$contratoAluguel}','{$contratoIptu}'" . ($contratoCondominio != null ? ',' . $contratoCondominio : '') . ")";

        $conn = $this->connection();
        if (mysqli_query($conn, $query)) {
            $valorPgto = round(($contratoAluguel + ($contratoIptu / 12) + $contratoCondominio), 2);
            $this->adicionarParcelas($conn->insert_id, $valorPgto, $contratoDataInicio, $contratoTaxaAdmin, $contratoCondominio);

            header('HTTP/1.1 200 OK');
            header('Location: /contrato');
        } else {
            header('HTTP/1.1 500 FAIL');
            header('Location: /home');
        }
    }*/
}
