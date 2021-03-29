let orderbyForm = document.querySelector("form#orderby");
let searchFilter = document.querySelector(".filter-search svg");

if (orderbyForm) {
	orderbyForm.querySelector(".active").addEventListener("click", () => {
		let select = orderbyForm.querySelector(".select");

		select.classList.toggle("hidden");

		select.querySelectorAll("span").forEach((span) => {
			span.addEventListener("click", () => {
				orderbyForm.querySelector("input[name='orderby']").value = span.dataset.orderby;
				orderbyForm.submit();
			});
		});
	});
}

if (searchFilter) {
	searchFilter.addEventListener("click", () => {
		document.querySelector(".sidebar.filter").classList.toggle("hidden");
	});
}
