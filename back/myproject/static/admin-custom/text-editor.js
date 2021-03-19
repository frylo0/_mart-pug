class DjangoEditor {
   constructor(basisLargeTextField, indexOnPage) {
      const self = this;
      this.$ = window.django.jQuery;
      const $ = this.$;

      this.indexOnPage = indexOnPage;
      this.$basisTextField = $(basisLargeTextField);

      this.$editor = $('<div class="editorjs" style="border: 1px solid #ccc; padding: 0.5em; border-radius: 4px;"></div>'); // create new el for editorjs

      this.$basisTextField // hide old editor
         .css('display', 'none')
         .attr('id', `editorjs${indexOnPage}`);

      this.$basisTextField.parents('.form-row').after(this.$editor); // inserting new editor

      this.editor = new EditorJS({
         holder: this.$editor[0],

         placeholder: 'Введите и отформатируйте текст...',

         onChange() {
            self.data.then(data => {
               console.log(data);
               self.$basisTextField.val(`<div data-json="${JSON.stringify(data.json).replace(new RegExp(DjangoEditor.quote, 'g'), DjangoEditor.quoteReplacer)}">${data.html}</div>`);
            });
         },

         tools: {
            paragraph: {
               class: Paragraph,
               inlineToolbar: true,
            },
            header: {
               class: Header,
               shortcut: 'CMD+SHIFT+H',
            },
            marker: {
               class: Marker,
               shortcut: 'CMD+SHIFT+M',
            },
            list: {
               class: List,
               inlineToolbar: true,
               shortcut: 'CMD+SHIFT+L',
            },
            underline: {
               class: Underline,
               shortcut: 'CMD+SHIFT+U',
            },
         }
      });

      let startupData = this.$basisTextField.val().match(new RegExp(`data-json=${DjangoEditor.quote}(.*?)${DjangoEditor.quote}>`));
      if (startupData) {
         startupData = startupData[0].slice(11, -2).replace(new RegExp(DjangoEditor.quoteReplacer, 'g'), DjangoEditor.quote);
         console.log(startupData);
         const startupJson = JSON.parse(startupData);
         console.log(startupJson);
         this.editor.isReady.then(() => self.editor.render(startupJson)); // will be done later (after isReady promise)
      } else {
         console.warn('On editorjs init: no startup data');
      }

   }

   get data() {
      return new Promise(async res => {
         const data = await this.editor.save().then(data => data);
         const blocks = data.blocks;
         const html = blocksToHtml(blocks);
         res({ html, json: data });

         function blocksToHtml(blocks) {
            // block: {   type: string = paragraph | bold | italic | ..., data: { text: string }   }
            let res = '';
            for (const block of blocks) {
               const text = block.data.text;
               switch (block.type) {
                  case 'paragraph': res += `<p align="${block.data.alignment}">${text}</p>`; break;
                  case 'header': res += `<h${block.data.level}>${text}</h${block.data.level}>`; break;
                  case 'list':
                     let type = block.data.style == 'unordered' ? 'u' : 'o';
                     res += `<${type}l>${block.data.items.map(li => `<li>${li}</li>`).join('')}</${type}l>`;
                     break;
                  default: console.warn(`blocksToHtml: Unhandled block type "${block.type}"`); console.warn(block);
               }
            }
            return res;
         }
      });
   }
}

DjangoEditor.quote = '"';
DjangoEditor.quoteReplacer = '&#!'; // Warning: if changed need to renew text data in admin panel!!

function main() {
   const $ = window.django.jQuery;
   $(document).ready(() => {
      const editors = [];

      const $textFields = $('.vLargeTextField');
      $textFields.each((i, el) => {
         editors.push(new DjangoEditor(el, i));
      });

      window.editors = editors;
   });
}
main();