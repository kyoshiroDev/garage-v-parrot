import Image from "next/image.js";

export default function Footer() {
	return (
		<footer
			className={
				"flex flex-wrap items-start justify-around px-10 py-5 mt-10 w-full bg-gray-200"
			}>
			{/* Horaires */}
			<div className={"flex-col items-start justify-center mt-5"}>
				<h3 className={"text-center text-2xl font-semibold"}>
					Horaires d'ouverture
				</h3>
				<div className={"flex flex-col gap-1 text-start pl-5 pt-5"}>
					<p>Lundi : 08:45 - 12h00 / 14h00 - 18h00</p>
					<p>Mardi : 08:45 - 12h00 / 14h00 - 18h00</p>
					<p>Mercredi : 08:45 - 12h00 / 14h00 - 18h00</p>
					<p>Jeudi : 08:45 - 12h00 / 14h00 - 18h00</p>
					<p>Vendredi : 08:45 - 12h00 / 14h00 - 18h00</p>
					<p>Samedi : 08:45 - 12h00 / Fermé</p>
					<p>Dimanche : Fermé</p>
				</div>
			</div>
			{/* Contact */}
			<div className={"flex flex-col items-center justify-center mt-5"}>
				<h3 className={"text-2xl font-semibold"}>Contact</h3>
				<p className={"pt-5"}>Par téléphone: 06.85.97.42.35</p>
				<p>Ou via notre formulaire</p>
			</div>
			{/*  Reseaux Sociaux*/}
			<div className={"flex flex-col items-center justify-center mt-5"}>
				<h3 className={"text-2xl font-semibold"}>Retrouvez-nous aussi sur:</h3>
				<span className={"flex items-center justify-start pt-5"}>
					<Image
						src={"/Footer/facebook.png"}
						alt={"icone facebook"}
						width={50}
						height={50}
						className={"aspect-square"}></Image>
					<Image
						src={"/Footer/instagram.png"}
						alt={"icone instagram"}
						width={50}
						height={50}
						className={"aspect-square"}></Image>
					<Image
						src={"/Footer/twitter.png"}
						alt={"icone twitter"}
						width={50}
						height={50}
						className={"aspect-square"}></Image>
				</span>
			</div>
			{/*  Mention légal et Cookies */}
			<div className={"flex flex-col items-center justify-center mt-5"}>
				<h3 className={"text-2xl font-semibold"}>En plus</h3>
				<p className={"pt-5"}>
					Mentions légales et politiques de confidentialités
				</p>
				<p>Cookies</p>
			</div>
			<div className={"w-full text-center mt-5"}>
				<p className={"text-xs"}>
					Copyright 2024 © Forge Digital Web - Tous droit réservés
				</p>
			</div>
		</footer>
	);
}
