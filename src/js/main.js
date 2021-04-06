let orderbyForm = document.querySelector("form#orderby");
let searchFilter = document.querySelector(".filter-search svg");
let lang_switcher = document.querySelector("form#lang_switcher");
let searchForm = document.querySelector("#custom-product-search");

if (orderbyForm) {
	let select = orderbyForm.querySelector(".select");

	orderbyForm.querySelector(".active").addEventListener("click", () => {
		select.classList.toggle("hidden");

		select.querySelectorAll("span").forEach((span) => {
			span.addEventListener("click", () => {
				orderbyForm.querySelector("input[name='orderby']").value = span.dataset.orderby;
				orderbyForm.submit();
			});
		});
	});

	document.addEventListener("click", (e) => {
		let elm = e.target;
		if (!orderbyForm.contains(elm)) {
			select.classList.add("hidden");
		}
	});
}

if (searchFilter) {
	searchFilter.addEventListener("click", () => {
		document.querySelector(".sidebar.filter").classList.toggle("hidden");
	});
}

if (lang_switcher) {
	lang_switcher.querySelector("select").addEventListener("change", () => {
		console.log(lang_switcher.querySelector("select"));
		lang_switcher.submit();
	});
}

if (searchForm) {
	searchForm.querySelector("form").addEventListener("submit", (e) => {
		if (searchForm.querySelector("form input.search-field").value == "") {
			e.preventDefault();
		}
	});

	searchForm.querySelector(".close").addEventListener("click", () => {
		searchForm.classList.add("hidden");
	});
}

document.querySelector("#svgs .search").addEventListener("click", () => {
	searchForm.classList.remove("hidden");
});
