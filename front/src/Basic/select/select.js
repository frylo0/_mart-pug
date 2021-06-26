import './__option/select__option';

$(document).ready(() => {
   const pref = '.select'; // prefix for current folder
   
   $(`${pref}__basis`).click(action('click: select__basis', e => {
      $(e.target).parents(pref).find(`${pref}__dropdown`).toggleClass('dn');
   }));
   $(`${pref}__option`).click(action('click: select__option', e => {
      const $select = $(e.target).parents(pref);
      $select.find(`${pref}__title`).text(e.target.textContent);
      const classSelected = `${pref}__option_selected`.slice(1);
      $select.find('.'+classSelected).removeClass(classSelected);
      e.target.classList.add(classSelected);
      $(`${pref}__basis`, $select).trigger('click');
      action('change: select')(e, $(e.target), $select);
   }));
});