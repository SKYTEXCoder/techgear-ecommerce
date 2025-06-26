import React from 'react';

function WelcomeBanner() {
    return (
        <div className="w-full bg-neutral-500 dark:bg-neutral-950">
            <div className="container mx-auto px-4">
                <div className="py-2 text-center text-sm text-white">
                    <p>
                        Welcome to <b>TechGear</b> - Buka Setiap Hari, dari jam 07:00 s.d. 22:00 WIB
                        <a href="/" className="ml-2 font-bold underline">
                            SHOP NOW!
                        </a>
                    </p>
                </div>
            </div>
        </div>
    );
}

export default WelcomeBanner;
