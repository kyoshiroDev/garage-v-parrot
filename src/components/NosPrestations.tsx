"use client";
import Image from "next/image";
import { useState } from "react";
import { motion } from "framer-motion";
import { NosPrestationsInterface } from "@/lib/interfaces";

export default function NosPrestations() {
	const [prestations] = useState<NosPrestationsInterface[]>([
		{
			id: 1,
			prestation: "Entretien mécanique toute marque",
			image: "/Entretien-véhicule/révision-voiture.jpeg",
		},
		{
			id: 2,
			prestation: "Réparation carosserie",
			image: "/reparation-carrosserie/debosselage.jpeg",
		},
		{
			id: 3,
			prestation: "Vente véhicule d'occasions",
			image: "/occasions/renault-clio.jpg",
		},
	]);

	return (
		<div className='flex flex-col lg:flex-row flex-wrap w-full mt-10 gap-20 justify-center items-center'>
			{prestations.map((prestation) => (
				<motion.div
					initial={{ opacity: 0 }}
					whileInView={{ opacity: 1 }}
					transition={{ duration: 0.5, ease: "linear", delay: 0.5 }}
					className='max-h-content relative'
					key={prestation.id}>
					<div className='absolute flex w-full min-h-full justify-center items-center px-auto'>
						<span className='absolute w-full h-full bg-gray-500 opacity-60 rounded-lg'></span>
						<p className='text-white font-semibold text-3xl p-4 text-center relative'>
							{prestation.prestation}
						</p>
					</div>
					<Image
						src={prestation.image}
						alt='alt'
						width={540}
						height={360}
						className='aspect-video bg-slate-200 border-2 rounded-lg border-black object-cover w-auto max-h-[300px]'
						priority
					/>
				</motion.div>
			))}
		</div>
	);
}
