import { PrestationsInterface } from "@/lib/interfaces";
import Image from "next/image";

export default function Prestations({
	title,
	textSup,
	imageSrc,
	imageAlt,
	textInf,
}: PrestationsInterface) {
	return (
		<div className='flex flex-col justify-items-end items-center max-w-[900px] m-auto gap-10 border-solid border-2 border-slate-200 rounded-xl p-5 '>
			<h2 className='border-none text-2xl p-0'>{title}</h2>
			<p>{textSup}</p>
			<Image
				src={imageSrc}
				alt={imageAlt}
				width={700}
				height={100}
				className='rounded-2xl aspect-auto w-auto h-auto'
				priority
			/>
			<p>{textInf}</p>
			<div className='flex flex-col justify-center items-center border border-garage-red p-5 rounded-3xl'>
				<p>CONTACT</p>
				<p>Par téléphone: 06.85.97.42.35</p>
				<p>
					ou via nôtre{" "}
					<span className='text-garage-red hover:text-garage-red-hover cursor-pointer'>
						formulaire
					</span>
				</p>
			</div>
		</div>
	);
}
