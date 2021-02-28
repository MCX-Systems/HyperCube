/**
* Bootstrap Table German translation
* Author: Paul Mohr - Sopamo<p.mohr@sopamo.de>
*/
(function ($) {
  'use strict';

  $.fn.bootstrapTable.locales['de'] = {
    formatLoadingMessage: function () {
      return 'Lade, bitte warten...';
    },
    formatRecordsPerPage: function (pageNumber) {
      return pageNumber + ' Zeilen pro Seite.';
    },
    formatShowingRows: function (pageFrom, pageTo, totalRows) {
      return 'Zeige Zeile ' + pageFrom + ' bis ' + pageTo + ' von ' + totalRows + ' Zeilen' + ((totalRows > 1) ? "n" : "")+".";
    },
    formatDetailPagination: function (totalRows) {
      return 'Zeige ' + totalRows + ' Zeile' + ((totalRows > 1) ? "n" : "")+".";
    },
    formatSearch: function () {
      return 'Suchen';
    },
    formatNoMatches: function () {
      return 'Keine passenden Ergebnisse gefunden';
    },
    formatPaginationSwitch: function () {
      return 'Verstecke/Zeige Nummerierung';
    },
    formatRefresh: function () {
      return 'Neu laden';
    },
    formatToggle: function () {
      return 'Umschalten';
    },
    formatColumns: function () {
      return 'Spalten';
    },
    formatAllRows: function () {
      return 'Alle';
    },
    formatExport: function () {
      return 'Datenexport';
    },
    formatClearFilters: function () {
      return 'Lösche Filter';
     }
  };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['de']);

})(jQuery);

/**
 * Bootstrap Table English translation
 * Author: Zhixin Wen<wenzhixin2010@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['en'] = {
        formatLoadingMessage: function () {
            return 'Loading, please wait...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' rows per page';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Showing ' + pageFrom + ' to ' + pageTo + ' of ' + totalRows + ' rows';
        },
        formatSearch: function () {
            return 'Search';
        },
        formatNoMatches: function () {
            return 'No matching records found';
        },
        formatPaginationSwitch: function () {
            return 'Hide/Show pagination';
        },
        formatRefresh: function () {
            return 'Refresh';
        },
        formatToggle: function () {
            return 'Toggle';
        },
        formatColumns: function () {
            return 'Columns';
        },
        formatAllRows: function () {
            return 'All';
        },
        formatExport: function () {
            return 'Export data';
        },
        formatClearFilters: function () {
            return 'Clear filters';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['en']);

})(jQuery);

/**
 * Bootstrap Table Basque (Basque Country) translation
 * Author: Iker Ibarguren Berasaluze<ikerib@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['eu'] = {
        formatLoadingMessage: function () {
            return 'Itxaron mesedez...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' emaitza orriko.';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return totalRows + ' erregistroetatik ' + pageFrom + 'etik ' + pageTo +'erakoak erakusten.';
        },
        formatSearch: function () {
            return 'Bilatu';
        },
        formatNoMatches: function () {
            return 'Ez da emaitzarik aurkitu';
        },
        formatPaginationSwitch: function () {
            return 'Ezkutatu/Erakutsi orrikatzea';
        },
        formatRefresh: function () {
            return 'Eguneratu';
        },
        formatToggle: function () {
            return 'Ezkutatu/Erakutsi';
        },
        formatColumns: function () {
            return 'Zutabeak';
        },
        formatAllRows: function () {
            return 'Guztiak';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['eu']);

})(jQuery);

/**
 * Bootstrap Table Slovenian translation
 * Author: Davorin Casar (casardavorin@gmail.com)
 * Author: Davorin Casar (casardavorin@gmail.com)
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['si'] = {
        formatLoadingMessage: function () {
            return 'Prosim počakajte ...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' broj zapisa po stranici';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Prikazujem ' + pageFrom + '. - ' + pageTo + '. od ukupnog broja zapisa ' + totalRows;
        },
        formatSearch: function () {
            return 'Iskanje';
        },
        formatNoMatches: function () {
            return 'Nije pronađen niti jedan zapis';
        },
        formatPaginationSwitch: function () {
            return 'Prikaži/sakrij stranice';
        },
        formatRefresh: function () {
            return 'Osveži';
        },
        formatToggle: function () {
            return 'Promijeni prikaz';
        },
        formatColumns: function () {
            return 'Kolone';
        },
        formatAllRows: function () {
            return 'Sve';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['si']);

})(jQuery);

/**
 * Bootstrap Table Russian translation
 * Author: Dunaevsky Maxim <dunmaksim@yandex.ru>
 */
(function ($) {
    'use strict';
    $.fn.bootstrapTable.locales['ru'] = {
        formatLoadingMessage: function () {
            return 'Пожалуйста, подождите, идёт загрузка...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' записей на страницу';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Записи с ' + pageFrom + ' по ' + pageTo + ' из ' + totalRows;
        },
        formatSearch: function () {
            return 'Поиск';
        },
        formatNoMatches: function () {
            return 'Ничего не найдено';
        },
        formatRefresh: function () {
            return 'Обновить';
        },
        formatToggle: function () {
            return 'Переключить';
        },
        formatColumns: function () {
            return 'Колонки';
        },
        formatClearFilters: function () {
            return 'Очистить фильтры';
        },
        formatMultipleSort: function () {
            return 'Множественная сортировка';
        },
        formatAddLevel: function () {
            return 'Добавить уровень';
        },
        formatDeleteLevel: function () {
            return 'Удалить уровень';
        },
        formatColumn: function () {
            return 'Колонка';
        },
        formatOrder: function () {
            return 'Порядок';
        },
        formatSortBy: function () {
            return 'Сортировать по';
        },
        formatThenBy: function () {
            return 'затем по';
        },
        formatSort: function () {
            return 'Сортировать';
        },
        formatCancel: function () {
            return 'Отмена';
        },
        formatDuplicateAlertTitle: function () {
            return 'Дублирование колонок!';
        },
        formatDuplicateAlertDescription: function () {
            return 'Удалите, пожалуйста, дублирующую колонку, или замените ее на другую.';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ru']);

})(jQuery);

/**
 * Bootstrap Table Chinese translation
 * Author: Zhixin Wen<wenzhixin2010@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['zh'] = {
        formatLoadingMessage: function () {
            return '正在努力地載入資料，請稍候……';
        },
        formatRecordsPerPage: function (pageNumber) {
            return '每頁顯示 ' + pageNumber + ' 項記錄';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '顯示第 ' + pageFrom + ' 到第 ' + pageTo + ' 項記錄，總共 ' + totalRows + ' 項記錄';
        },
        formatSearch: function () {
            return '搜尋';
        },
        formatNoMatches: function () {
            return '沒有找到符合的結果';
        },
        formatPaginationSwitch: function () {
            return '隱藏/顯示分頁';
        },
        formatRefresh: function () {
            return '重新整理';
        },
        formatToggle: function () {
            return '切換';
        },
        formatColumns: function () {
            return '列';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['zh']);

})(jQuery);