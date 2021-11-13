#include <stdio.h>
#include <stdlib.h>
#include <strings.h>

char p[23] = "}esr&ver_eb@s_nh0j{GALF";
char flag[23] = "";

char frases[10][256] = {
    "Com grandes poderes, vem grandes responsabilidades - Ben Parker",
    "Quanto mais quieto voce estiver, mais voce podera escutar - Kali Linux",
    "A vida e um fenonemo superstimado - Dr. Manhantan",
    "So sei que nada sei - Socrates",
    "Qualquer frase 5 - Autor",
    "Qualquer frase 6 - Autor",
    "Qualquer frase 7 - Autor",
    "Qualquer frase 8 - Autor",
    "Qualquer frase 9 - Autor",
    "Muito bem, voce e o cara! - Kurogai"
};

void main(int args, char * argv[]){
    int a = 0;
    printf("Pronto para ver uma frase? (digite)");
    scanf("%i",&a);

    for(int max = 0; max < 10; max++){
        puts(frases[max]);
        scanf("%i",&a);
        if(max == 9){
            printf("\nAccao bloqueada... porfavor digite a senha pra continuar\n");
            printf("Senha: ");
            char senha[23] = "";
            gets(senha);

            for(int i = 22; i >= 0; i--){
                flag[i] = p[i];
            }
            if(strcmp(senha,flag)){
                puts(frases[9]);
                exit(0);
            }
            printf("\nBloqueado!\n");
            return;
        }
    }

    printf("\n");
}