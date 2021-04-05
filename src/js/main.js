let orderbyForm = document.querySelector("form#orderby");
let searchFilter = document.querySelector(".filter-search svg");

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

	document.addEventListener('click', (e)=>{
		let elm = e.target;
		if(!orderbyForm.contains(elm)){
			select.classList.add("hidden");
		}
	});
}

if (searchFilter) {
	searchFilter.addEventListener("click", () => {
		document.querySelector(".sidebar.filter").classList.toggle("hidden");
	});
}
