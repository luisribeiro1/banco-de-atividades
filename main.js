document.addEventListener("DOMContentLoaded", function () {
   // Seleciona todos os botões dentro do container
   const buttons = document.querySelectorAll(".container button");

   // Adiciona um event listener para cada botão
   buttons.forEach((button) => {
      button.addEventListener("click", function (event) {
         // Obtém o ID do botão clicado
         const buttonId = event.target.id;
         
         // Define o nome do arquivo Markdown com base no ID do botão
         const markdownFile = `md/arquivo_${buttonId}.md`;
         
         const offcanvasTitle = document.querySelector(".offcanvas-title");
         const offcanvasBody = document.querySelector(".offcanvas-body");

         // Faz a requisição do arquivo Markdown
         fetch(markdownFile)
            .then((response) => {
               if (!response.ok) {
                  offcanvasTitle.innerHTML = "[ Em breve ]";
                  offcanvasBody.innerHTML = "";
                  throw new Error("Arquivo não encontrado");
               }

               return response.text();
            })
            .then((text) => {
               // Converte o Markdown para HTML
               const { title, body } = convertMarkdownToHTML(text);

               // Insere o título
               offcanvasTitle.innerHTML = title;

               // Insere o restantante do conteudo 
               offcanvasBody.innerHTML = body;
            })
            .catch((error) => {
               console.error("Erro ao carregar o arquivo:", error);
            });
      });
   });
});

/**
 * Converte texto Markdown para HTML, extraindo o título e o corpo.
 *
 * @param {string} markdownText - O texto em Markdown.
 * @returns {object} - Um objeto contendo o título e o corpo em HTML.
 */

function convertMarkdownToHTML(markdownText) {
   // Dividir o texto em linhas
   const lines = markdownText.split("\n");

   let title = "";
   let bodyMarkdown = "";

   // Procurar o título (primeira linha começando com "# ")
   for (let i = 0; i < lines.length; i++) {
      const line = lines[i].trim();
      if (line.startsWith("# ") && !title) {
         title = line.substring(2).trim(); // Extrair o título
      } else {
         bodyMarkdown += line + "\n";
      }
   }

   // Funções de conversão Markdown para HTML
   const markdownToHTML = (markdown) => {
      let html = markdown;

      // Converter títulos (h1 a h6)
      html = html.replace(/^###### (.+)$/gm, "<h6>$1</h6>");
      html = html.replace(/^##### (.+)$/gm, "<h5>$1</h5>");
      html = html.replace(/^#### (.+)$/gm, "<h4>$1</h4>");
      html = html.replace(/^### (.+)$/gm, "<h3>$1</h3>");
      html = html.replace(/^## (.+)$/gm, "<h2>$1</h2>");
      html = html.replace(/^# (.+)$/gm, "<h1>$1</h1>");

      // Converter texto em negrito (**texto** ou __texto__)
      html = html.replace(/\*\*(.+?)\*\*/g, "<strong>$1</strong>");
      html = html.replace(/__(.+?)__/g, "<strong>$1</strong>");

      // Converter texto em itálico (*texto* ou _texto_)
      html = html.replace(/\*(.+?)\*/g, "<em>$1</em>");
      html = html.replace(/_(.+?)_/g, "<em>$1</em>");

      // Converter listas não ordenadas (- ou *)
      html = html.replace(/^- (.+)$/gm, "<li>$1</li>");
      html = html.replace(/^\* (.+)$/gm, "<li>$1</li>");
      html = html.replace(/(<li>.*<\/li>)/gms, "<ul>$1</ul>");

      // Converter links [texto](url)
      html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2">$1</a>');

      // Converter blocos de código ```linguagem\ncódigo\n```
      html = html.replace(
         /```(?:\w+)?\n([\s\S]*?)```/g,
         "<pre><code>$1</code></pre>"
      );

      // Converter código inline `código`
      html = html.replace(/`([^`]+)`/g, "<code>$1</code>");

      // Converter divisores horizontais (---, ***, ___)
      html = html.replace(/^(-{3,}|\*{3,}|_{3,})$/gm, "<hr>");

      // Converter quebras de linha
      html = html.replace(/\n/g, "</p><p>");

      return html;
   };

   // Converter o corpo do Markdown para HTML
   const bodyHTML = markdownToHTML(bodyMarkdown.trim());

   return {
      title,
      body: bodyHTML,
   };
}
