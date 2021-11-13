- cria uma conta
- loga na conta
- analisa o sistema de mensagens (os hackers poderao ver uns aos outros aqui no chat)

(Ele precisa hackear a conta da namorada)

=> Jeito facil
    - Verifica os cookies da conta
    - Faz bruteforce no id da conta (tomando em atencao o filtro do csrf, variavel em 3 nomes com rotacao)
    - O id da conta esta a partir de 01100 ate 09102 para a conta alvo

=> Jeito CTF
    - Ele tenta recuperar a conta atravez do numero
    - Ele especifica o email para receber a conta
    - Hacker captura link de recuperacao da conta pelo header (em base64)
    - Hacker usa o link para acessar ao painel de recuperacao
    - Hacker faz forca bruta no codigo de verificacao
    - Hacker acessa a conta alvo

BASE DE DADOS

account
    id, email, nome, password

message
    id, nome, content, data

recover
    id, email, token, password