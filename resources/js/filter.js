
Vue.filter("strToUpper", function(text) {
	return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter("FormatMoney", function(text) {
	text = parseFloat(text);
	return 'R$ ' + text.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
});

import moment from "moment";

Vue.filter("formatDate", function(date) {

	return moment(date).format('D/M/YYYY');

}); 