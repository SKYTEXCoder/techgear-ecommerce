import { Appearance, useAppearance } from '@/hooks/use-appearance';
import { cn } from '@/lib/utils';
import { Moon, Sun } from 'lucide-react';
import React, { HTMLAttributes } from 'react'

function AppearanceToggleTab({ className = '', ...props}: HTMLAttributes<HTMLDivElement>) {
    const { appearance, updateAppearance } = useAppearance();
    const isDark = appearance === 'dark';

    const toggleAppearance = () => {
        updateAppearance(isDark ? 'light' : 'dark');
    };

    return (
        <div
            onClick={toggleAppearance}
            className={cn(
                'inline-flex relative overflow-hidden rounded-full border border-neutral-200 bg-neutral-100 dark:border-neutral-700 dark:bg-neutral-800 cursor-pointer',
                'w-[88px] h-[36px]',
                className
            )}
            {...props}
        >

            <div className={cn(
                'absolute top-0.5 h-[calc(100%-4px)] w-[42px] rounded-full bg-white dark:bg-neutral-700 transition-transform duration-300',
                isDark ? 'translate-x-[44px]' : 'translate-x-[2px]'
            )} />

            <div className={cn(
                'flex items-center justify-center w-1/2 z-10 transition-colors duration-300',
                !isDark ? 'text-black' : 'text-neutral-500'
            )}>
                <Sun className="h-4 w-4" />
            </div>

            <div className={cn(
                'flex items-center justify-center w-1/2 z-10 transition-colors duration-300',
                isDark ? 'text-white' : 'text-neutral-500'
            )}>
                <Moon className="h-4 w-4" />
            </div>
        </div>
    )
}

export default AppearanceToggleTab
