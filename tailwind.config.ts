import type { Config } from "tailwindcss";

export default {
	darkMode: ["class"],
	content: ["./src/**/*.{js,ts,jsx,tsx,mdx}"],
	theme: {
		extend: {
			colors: {
				garage: {
					red: "#D92332",
					"red-hover": "#AA202B",
				},
			},
			fontFamily: {
				sans: ["var(--font-barlow)"],
				serif: ["var(--font-prata)"],
			},
		},
	},
	plugins: [],
} satisfies Config;
