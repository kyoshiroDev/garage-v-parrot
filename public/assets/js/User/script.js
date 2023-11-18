let dataArray;

async function getUsers() {
	try {
		await fetch("/admin/user/all")
			.then((res) => res.json())
			.then((data) => {
				orderList(data);
				dataArray = data;
				createUserList(data);
			});
	} catch (error) {
	}
}
let users = getUsers();

/* Mise en ordre alphabétique */
function orderList(data) {
	data.sort((a, b) => {
		if (a.last_name < b.last_name) {
			return -1;
		} else if (a.last_name > b.last_name) {
			return 1;
		} else {
			return 0;
		}
	});
}

/* Création du table avec nos données */
const tableResults = document.querySelector(".table-results");

function createUserList(data) {
	data.forEach((user) => {
		const listItem = document.createElement("tr");
		listItem.className = "table-item text-center fs-6 w-25";

		listItem.innerHTML = `
							<td class="align-middle">${user.last_name}</td>
							<td class="align-middle">${user.first_name}</td>
							<td class="align-middle d-none d-lg-table-cell">${user.email}</td>
							<td class="align-middle d-none d-xl-table-cell">${user.roles}</td>
							<td class="align-middle d-none d-xl-table-cell">${user.created_at}</td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic outlined example">
										<a href="/admin/user/${user.id}" class="btn btn-outline-danger">Voir</a>	
										<a href="/admin/user/${user.id}/edit" class="btn btn-outline-danger">Modifier</a>
										<a href="/admin/user/${user.id}" class="btn btn-outline-danger d-none d-lg-block">Supprimer</a>
								</div>
							</td>	
    `;
		tableResults.appendChild(listItem);
	});
}

/* Filtration de nos données */
const searchInput = document.querySelector("#myInput");

searchInput.addEventListener("input", filterData);

function filterData(e) {
	tableResults.textContent = "";

	const searchedString = e.target.value.toLowerCase().replace(/\s/g, "");

	const filteredArr = dataArray.filter((data) => searchForOccurences(data));

	function searchForOccurences(user) {
		const searchType = {
			firstname: user.first_name.toLowerCase(),
			lastname: user.last_name.toLowerCase(),
			firstAndLast: `${user.first_name + user.last_name}`.toLowerCase(),
			lastAndFirst: `${user.last_name + user.first_name}`.toLowerCase(),
		};
		for (const prop in searchType) {
			if (searchType[prop].includes(searchedString)) {
				return true;
			}
		}
	}

	createUserList(filteredArr);
}
