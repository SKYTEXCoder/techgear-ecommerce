import { Appearance, useAppearance } from '@/hooks/use-appearance';
import { cn } from '@/lib/utils';
import { Moon, Sun } from 'lucide-react';
import React, { HTMLAttributes } from 'react'

function AppearanceToggleTab({ className = '', ...props}: HTMLAttributes<HTMLDivElement>) {
    const { appearance, updateAppearance } = useAppearance();

    const tabs: { value: Appearance; icon: React.ElementType; label: string }[] = [
        { value: 'light', icon: Sun, label: 'Light' },
        { value: 'dark', icon: Moon, label: 'Dark' },
    ];

  return (
    <div className={cn('inline-flex overflow-hidden rounded-full border border-neutral-200 bg-neutral-100 dark:border-neutral-700 dark:bg-neutral-800', className)} {...props}>
        {tabs.map(({ value, icon: Icon, label }) => (
            <button
                key={value}
                type="button"
                onClick={() => updateAppearance(value)}
                className={cn(
                    'flex items-center gap-1 px-4 py-1.5 text-sm font-medium transition-colors focus:outline-none',
                    appearance === value
                        ? 'bg-white text-black shadow dark:bg-neutral-700 dark:text-white'
                        : 'text-neutral-500 hover:bg-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-700')}
                aria-pressed={appearance === value}>
                    <Icon className="h-4 w-4" />
                    <span>{label}</span>
            </button>
        ))}
    </div>
  )
}

export default AppearanceToggleTab
