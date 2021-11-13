[Bank – Médio – 30pts]

Pé Inicial
Este desafio tem como objetivo exibir o quão perigoso pode ser a realização de um ataque a um banco, começando com a coleta de informações do alvo, criação de uma conta com verificação de email (na qual pode ser bypassado), um SQLi escondido (na parte de enviar mensagem) que retorna as informações principais do banco. Neste ponto o atacante deve se preocupar em obter as informações de um dos gestores onde vai ter uma tabela, o atacante vai precisar quebrar essas senhas onde poderá usar para logar no painel de administração do banco.

Feito isso, o atacante vai ter de conseguir fazer upload de um arquivo com a shell reversa (na qual vai tentar sanitizar o arquivo) para que possa ter acesso remoto ao servidor. A senha para poder logar com um dos usuários está dentro do arquivo onde faz a conexão com a base de dados dentro do servidor. Feito isso o usuário pega a senha e consequentemente logar via (SSH ou Shell Reversa / Bind) onde obtém a primeira flag (arquivo flag.txt).

Descrição (e dica)
“Quero assaltar o banco, precisamos tomar controle da area administrativa, voce esta DENTRO?”

Etapas:

- Hacker visita o site
- Cria sua conta no banco (nome, palavra-passe, idade, localizacao, montante) -> gera-se o login da conta para logar
- Loga na sua conta (id, palavra-passe)
- SQLi:
    - Enviar mensagem (id da conta, mensagem)
- Hacker contrai base de dados e localiza a conta do gestor (onde vai quebrar elas) -> (email, nome, senha) // desabilitar funcao que permite spawnar uma shell no servidor
- Painel lista todas as contas do sistema do banco (nome, palavra-passe, montante)
- Painel dos documentos lista todos os documentos do banco (permite enviar e ler)
- Hacker faz upload da shell fazendo bypass no filtro (dar uma dica de firewall aqui ;) )
- Atacante pega a flag nos documentos da empresa (a dica para pegar a flag vai estar no servidor)