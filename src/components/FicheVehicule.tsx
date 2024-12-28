import Link from "next/link";
import Image from "next/image";
//import { VehiculeInterface } from "@/lib/interfaces";
import { Cars } from "@prisma/client";

export default async function FicheVehicule({
	vehicules,
}: {
	vehicules: Cars[];
}) {
	return (
		<>
			{vehicules.map((vehicule) => (
				<Link
					href={`../pages/occasions/${vehicule.id}/`}
					key={vehicule.id}
					className='flex flex-col items-center rounded-2xl border-2 border-slate-600 cursor-pointer hover:border-garage-red'>
					<Image
						src={vehicule.image}
						alt={vehicule.marque + vehicule.model}
						width={500}
						height={200}
						className='aspect-auto rounded-t-2xl border-b-2 border-slate-600'
						priority
					/>
					<div className='flex flex-col w-full justify-center items-center my-3'>
						<p className='text-2xl font-semibold my-3'>
							{vehicule.marque} {vehicule.model}
						</p>
						<div className='text-xl flex flex-col items-start gap-1 p-3 w-full'>
							<div className='flex w-full justify-between'>
								Kilomètrages: <p>{vehicule.kilometrage}</p>
							</div>
							<div className='flex w-full justify-between'>
								portes: <p>{vehicule.portes}</p>
							</div>
							<div className='flex w-full justify-between'>
								CV Fiscaux: <p>{vehicule.puissance}</p>
							</div>
							<div className='flex w-full justify-between'>
								Premiére mise en circulation: <p>{vehicule.date}</p>
							</div>
							<div className='flex w-full justify-between'>
								Energie: <p>{vehicule.energie}</p>
							</div>
							<div className='flex w-full justify-between'>
								prix: <p>{vehicule.prix}</p>
							</div>
						</div>
					</div>
				</Link>
			))}
		</>
	);
}
