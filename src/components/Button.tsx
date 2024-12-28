"use client";

export default function Button({
	children,
}: Readonly<{
	children: React.ReactNode;
}>) {
	return <button className='button'>{children}</button>;
}
