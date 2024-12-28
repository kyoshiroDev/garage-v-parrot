import Prestations from "@/components/Prestations";
import { PrestationsInterface } from "@/lib/interfaces";

export default function Mecanique() {
	const revision: PrestationsInterface = {
		title: "Révision voiture",
		textSup:
			"La révision de voiture intervient tous les 15 à 20 000 kilomètres, elle est obligatoire à l’entretien de votre véhicule. Chez V.PARROT, nous sommes experts de la révision constructeur. Celle-ci permet d’assurer le fonctionnement de votre véhicule et de garantir votre sécurité tout en préservant la Garantie Constructeur de votre voiture.",
		imageSrc: "/Entretien-véhicule/révision-voiture.jpeg",
		imageAlt: "révision d'un véhicule",
		textInf:
			"Nos techniciens respectent votre plan d’entretien à la lettre et proposent plusieurs forfaits incluant la vidange, le remplacement des filtres à air ou encore le diagnostic de la batterie. Au total, nous contrôlons jusqu’à 135 points pour fournir un entretien mécanique optimal et adapté aux besoins de votre véhicule.",
	};
	const vidange: PrestationsInterface = {
		title: "Vidange",
		textSup:
			"La vidange est indispensable pour entretenir votre voiture. Si elle est négligée, le moteur peut s’encrasser, causant alors des baisses de performance dans la durée et une augmentation de la consommation de carburant. Pour éviter le déclenchement de votre voyant d’huile moteur, nous vous recommandons de procéder au remplacement de l’huile moteur tous les 10 à 30 000 kilomètres en fonction des préconisations du constructeur.",
		imageSrc: "/Entretien-véhicule/vidange.jpg",
		imageAlt: "vidange d'un véhicule",
		textInf:
			"Nous utilisons les huiles ELF Powertech pour maintenir les bonnes performances de votre voiture.",
	};
	const freinage: PrestationsInterface = {
		title: "Freinage",
		textSup:
			"Le contrôle des plaquettes de frein, des disques de frein et du circuit de freinage est indispensable pour un entretien mécanique réussi. N’hésitez pas à nous contacter si vous constatez des anomalies ou une augmentation de votre distance de freinage.",
		imageSrc: "/Entretien-véhicule/freinage.png",
		imageAlt: "changement plaquette de frein du véhicule",
		textInf:
			"Nos experts détailleront l’état de votre système de freinage et prendront les mesures nécessaires pour assurer votre sécurité.",
	};

	return (
		<div className='flex flex-col justify-arround items-center gap-20 mt-10'>
			<h1 className='text-4xl text-center text-garage-red font-semibold'>
				Entretien du véhicule
			</h1>
			<Prestations
				title={revision.title}
				textSup={revision.textSup}
				imageSrc={revision.imageSrc}
				imageAlt={revision.imageAlt}
				textInf={revision.textInf}
			/>
			<Prestations
				title={vidange.title}
				textSup={vidange.textSup}
				imageSrc={vidange.imageSrc}
				imageAlt={vidange.imageAlt}
				textInf={vidange.textInf}
			/>
			<Prestations
				title={freinage.title}
				textSup={freinage.textSup}
				imageSrc={freinage.imageSrc}
				imageAlt={freinage.imageAlt}
				textInf={freinage.textInf}
			/>
		</div>
	);
}
