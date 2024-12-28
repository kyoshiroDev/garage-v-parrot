import { Rajdhani } from "next/font/google";
import type { Metadata } from "next";

import React from "react";
import MainLayout from "./pages/layout";
import QuiSommeNous from "@/components/QuiSommesNous";
import NosPrestations from "@/components/NosPrestations";
import AvisClients from "@/components/AvisClients";

// Metadata
const metadata: Metadata = {
	title: "Garage V Parrot | Accueil",
	description:
		"Avec 15 ans d'expérience, Vincent Parrot a fondé un garage à Toulouse pour offrir un service de réparation automobile de confiance et des voitures d'occasion de qualité. Son équipe qualifiée s'engage à fournir un service personnalisé et transparent pour répondre aux besoins spécifiques de chaque client.",
};

export default function Home() {
	return (
		<MainLayout>
			{/* Qui sommes-nous */}
			<QuiSommeNous />

			{/* Nos prestations */}
			<section>
				<h2 className={`mx-auto my-20 font-mono`}>Nos prestations</h2>
				<NosPrestations />
			</section>

			{/* Avis client */}
			<section>
				<AvisClients />
			</section>
		</MainLayout>
	);
}
