import FicheVehicule from "@/components/FicheVehicule";
import { getCars } from "../../actions/carsActions";

export default async function Occasions() {
	const vehicules = await getCars();

	return (
		<main>
			<h1 className='text-center text-3xl text-garage-red'>Nos Occasions</h1>
			<div className='m-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-col-4 gap-4 max-w-[1280px] mt-10'>
				<FicheVehicule vehicules={vehicules} />
			</div>
		</main>
	);
}
